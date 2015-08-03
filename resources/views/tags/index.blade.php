@extends('app')
@section('content')

    <div class="container">
        <h1>Tags</h1>

        <a href="{{ route('tags.create') }}" class="btn btn-default">New Tag</a>

        <br><br>

        <table class="table">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Options</th>
            </tr>

            @foreach($tags as $tag)
                <tr>
                    <td>{{ @$tag->id }}</td>
                    <td>{{ @$tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', ['id'=>$tag->id]) }}">Edit</a> |
                        <a href="{{ route('tags.destroy', ['id'=>$tag->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

        {!! $tags->render() !!}

    </div>

@stop