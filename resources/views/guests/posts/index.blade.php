@extends('layouts.app')

@section('menu-item')
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.posts.create') }}">Crea Post</a>
</li>
@endsection

@section('content')
<div class="container">
    <h1>Blog</h1>
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div> 
    @endif
    @foreach ($posts as $post)
        <div class="card my-3">
            <div class="card-header d-flex justify-content-between">
                <h3>{{ $post->title }}</h3>
                <small class="card-title">{{ $post->created_at->format('d-m-Y')}}</small>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->body }}</p>
                <p>{{ $post->user->name }}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('posts.show', $post->slug)}}" class="btn btn-primary btn-sm">Show</a>    
                </div>  
            </div>
        </div>
    @endforeach
</div> 
@endsection