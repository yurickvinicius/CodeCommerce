@extends('app')
@section('content')

    <div class="container">
        <h1>Add Tag for product: {{ $product->name }}</h1>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['route'=>['products.tags.store',$product->id], 'method'=>'post']) !!}

        <div class="form-group">
            {!! Form::label('tag','Tag:') !!}
            {!! Form::select('tag_id', $tags, null, ['class'=>'form-control']) !!}
        </div>

        <div>
            {!! Form::submit('Save Tag', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop