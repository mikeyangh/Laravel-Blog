@extends('main')

@section('title', ' | Edit Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Edit Comment</h2>
            {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}

            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}

            {{ Form::label('comment', 'Comment:') }}
            {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

            {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success form-spacing-top']) }}

            {{ Form::close() }}
        </div>
    </div>


@endsection