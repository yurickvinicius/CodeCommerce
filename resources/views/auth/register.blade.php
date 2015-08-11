@extends('store.store')
@section('content')

<div class="form-group">
    <h2>REGISTER USER</h2>

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email', null) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password', null) !!}
    </div>

    <div class="form-group">
        {!! Form::label('check_password','Password:') !!}
        {!! Form::password('check_password', null) !!}
    </div>

    <div>
        {!! Form::submit('Register User',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>

@stop