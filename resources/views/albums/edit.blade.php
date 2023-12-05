@extends('layouts.app')

@section('title', 'Edit Album')

@section('content')
    <h1>Edit Album</h1>

    <form action="{{ route('albums.update', ['album' => $album->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $album->title }}"
                class="form-control @error('title') is-invalid @enderror" required autocomplete="title" >
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div id="search_list"></div>


        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ $album->description }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image"
                name="cover_image" value="{{ $album->cover_image }}">
            @error('cover_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
            <label for="current_cover_image">Current Cover Image</label>
            <img id='current_cover_image' src="{{ asset('storage/images/' . $album->cover_image) }}"
                alt="{{ $album->title }}" class="img-thumbnail">

        </div>

        <div>
            <label for="Artist">Artist</label>
            <input type="text" id="artist" name="artist" value="{{ $album->artist }}"
                class="form-control @error('artist') is-invalid @enderror">
            @error('artist')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <button type="submit">Save</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="{{ asset('storage/js/albumImageAutoResolver.js') }}"></script>



@endsection
