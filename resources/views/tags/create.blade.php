@extends('app')
@section('content')

    <div class="container">
        <h1>Create Tags</h1>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>'tags.store']) !!}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div>
            {!! Form::submit('Add Tag', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('tags') }}" class="btn btn-default">Voltar</a>
        </div>

        {!! Form::close() !!}

    </div>

@stop