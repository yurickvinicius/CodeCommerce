@extends('app')
@section('content')

    <div class="container">
        <h1>Images of {{ $product->name }}</h1>

        <a href="{{ route('products.tags.create', ['id'=>$product->id]) }}" class="btn btn-default">New Tag</a>

        <br><br>

        <table class="table">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            @foreach($product->tags as $tag)
                <tr>
                    <td>{{ @$tag->id }}</td>
                    <td>
                        {{ @$tag->name }}
                    </td>
                    <td>
                        <a href="{{ route('products.tags.destroy',['tag_id'=>$tag->id, 'product_id'=>$product->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

        <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

    </div>

@stop