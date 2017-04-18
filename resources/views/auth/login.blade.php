@extends('main')

@section('title', ' | Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}

            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}

            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}

            <br>
            {{ Form::checkbox('remember') }} {{ Form::label('remember', 'Remember me') }}

            <br>
            {{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}

            <p>
                <span style="float: left"><a href="{{ url('password/reset') }}">Forgot My Password</a></span>
                <span style="float: right"><a href="{{ url('auth/register') }}">New User?</a></span>
            </p>

            {!! Form::close() !!}
        </div>
    </div>

@endsection