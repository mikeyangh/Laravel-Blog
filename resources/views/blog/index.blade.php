@extends('main')

@section('title', ' | Blog')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>
    <hr>

    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title }}</h2>
            <h5>Published: {{ date('M-d-Y, H:i', strtotime($post->created_at)) }}</h5>

            <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...': ''  }}</p>

            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
        </div>
    </div>
    <hr>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection