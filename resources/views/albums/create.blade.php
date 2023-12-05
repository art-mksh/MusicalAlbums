@extends('layouts.app')

@section('title', 'Create Album')

@section('content')
    <h1>Create Album</h1>

    <form action="{{ route('albums.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror"  required autocomplete="title" >

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        </div>
        <div id="search_list"></div>

        <div class="form-group">
            <label for="cover_image">Image</label>
            <input type="file" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
            @error('cover_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="current_cover_image">Cover Image</label>
            <img id='current_cover_image' src=""
                alt="new_img" class="img-thumbnail">

        </div>

        <div  class="form-group">
            <label for="artist">Artist</label>
            <input type="text" id="artist" name="artist"  class="form-control @error('artist') is-invalid @enderror" value="{{ old('artist') }}">
            @error('artist')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div  class="form-group">
            <label for="description">description</label>
            <input type="text" id="description" name="description"  class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') }}">
            @error('description')
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
