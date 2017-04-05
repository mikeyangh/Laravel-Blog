<?php
/**
 * Created by PhpStorm.
 * User: YCG
 * Date: 3/31/17
 * Time: 4:13 PM
 */

namespace App\Http\Controllers;

use App\Post;

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

//        return view('pages.about')->with("fullname", $full);
//        return view('pages.about')
//            ->withFullname($fullname)
//            ->withEmail($email);
        return view('pages.about')->withData($data);
    }

    public function getContact() {
//        return "Hello Contact Page";
        return view('pages.contact');
    }

    public function postContact() {

    }

}

?>