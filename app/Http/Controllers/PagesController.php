<?php
/**
 * Created by PhpStorm.
 * User: YCG
 * Date: 3/31/17
 * Time: 4:13 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout() {
        $first = 'Mike';
        $last = 'Yang';

        $fullname = $first . " " . $last;
        $email = "chengguy@usc.edu";
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;

        return view('pages.about')->withData($data);
    }

    public function getContact() {
//        return "Hello Contact Page";
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::queue('emails.contact', $data, function($message) use ($data) {
//        Mail::later(5, 'emails.contact', $data, function($message) use ($data) {
                $message->from($data['email']);
                $message->to('yangchengguang1992@gmail.com');
                $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was sent!');

        return redirect()->route('index');
    }

}

?>