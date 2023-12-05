@extends('layouts.app')

@section('title', $album->title)

@section('content')
    <h1>{{ $album->title }}</h1>

    <p>{{ $album->description }}</p>

    <p>Artist: {{ $album->name }}</p>

    <img src="{{ asset('storage/images/'. $album->cover_image) }}" alt="{{ $album->title }}">

    <a href="{{ route('albums.index') }}">Back to albums</a>
@endsection
