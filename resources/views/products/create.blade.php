@extends('app')
@section('content')

    <div class="container">
        <h1>Create Products</h1>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['url'=>'products']) !!}

        <div class="form-group">
            {!! Form::label('category','Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
        </div>

        <div>
            {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
        </div>

        {!! Form::close() !!}

    </div>

@stop