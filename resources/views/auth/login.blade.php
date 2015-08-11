@extends('store.store')
@section('content')

    <div class="form-group">
        {!! Form::open(array('auth' => 'login')) !!}
        <h1>Login</h1>

        <!-- if there are login errors, show them here -->
        <p>
            {!! $errors->first('email') !!}
            {!! $errors->first('password') !!}
        </p>

        <p>
            {!! Form::label('email', 'Email Address') !!}
            {!! Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) !!}
        </p>

        <p>
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password') !!}
        </p>

        <p>{!! Form::submit('Submit!') !!}</p>
        {!! Form::close() !!}

        <a href="{{ url('/password/email') }}">Forgot your password?</a>
        |
        <a href="{{ url('/auth/register') }}">New user</a>
    </div>

@stop