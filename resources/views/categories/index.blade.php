@extends('app')
@section('content')

    <div class="container">
        <h1>Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-default">New Category</a>

        <br><br>

        <table class="table">
            
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            @foreach($categories as $categorie)
            <tr>
                <td>{{ @$categorie->id }}</td>
                <td>{{ @$categorie->name }}</td>
                <td>{{ @$categorie->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', ['id' => $categorie->id]) }}">Edit</a> |
                    <a href="{{ route('categories.destroy', ['id' => $categorie->id]) }}">Delete</a>
                </td>
            </tr>
            @endforeach
            
        </table>

        {!! $categories->render() !!}

    </div>

@stop