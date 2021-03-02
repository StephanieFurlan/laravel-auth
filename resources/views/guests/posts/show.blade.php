@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>{{ $post->title }}</h1>
        @if (!empty($post->img_path))
            <img class="rounded mx-auto d-block" style="width:60%" src="{{ asset('storage/' . $post->img_path ) }}" alt="{{ $post->title }}">
        @else
            <img class="rounded mx-auto d-block" style="width:60%" src="{{ asset('images/placeholder.png' ) }}" alt="{{ $post->title }}">
        @endif
        <p>{{ $post->body }}</p>
    </div> 
@endsection