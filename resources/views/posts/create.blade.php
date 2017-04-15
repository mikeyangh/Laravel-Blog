@extends('main')

@section('title', ' | Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5s0y8rloo5to7iabxx06kr27x6df5xrh1gaj3na1yfx3dntj"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>

@endsection

@section('nav_bar')
    <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="about">About</a></li>
        <li><a href="contact">Contact</a></li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '50', 'data-parsley-required-message' => "Title cannot be empty"]) }}

                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}

                {{ Form::label('category', 'Category:') }}
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('tags', 'Tags:') }}
                <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('featured_image', 'Upload Featured Image:') }}
                {{ Form::file('featured_image') }}
            
                {{ Form::label('body', 'Post Body:') }}
                {{--{{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '', 'data-parsley-required-message' => "Body cannot be empty"]) }}--}}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create Post',
                ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/validate.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') !!}

    <script>
        $('.select2-multi').select2();
    </script>
@endsection