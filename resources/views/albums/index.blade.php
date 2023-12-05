@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Albums</h1>
        <a href="{{ route('albums.create') }}">Add New Album</a>
        <table>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            @foreach($albums as $album)
                <tr>
                    <td>{{ $album->title }}</td>
                    <td>{{ $album->artist }}</td>
                    <td>{{ $album->description }}</td>
                    <td><img src="{{ asset('storage/images/'. $album->cover_image) }}" alt="{{ $album->title }}"></td>

                    <td>
                        <a href="{{ route('albums.edit', ['album' => $album->id]) }}">Edit</a>

                        <form action="{{ route('albums.destroy', ['album' => $album->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>


    </div>

    {{ $albums->links('pagination.custom') }}

@endsection
