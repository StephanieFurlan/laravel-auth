@extends('layouts.app')

@section('menu-item')
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.posts.index') }}">Tutti i Post</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.posts.create') }}">Crea Post</a>
</li>
@endsection

@section('content')
    <div class="container">
        <h1>Crea un nuovo Post</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" placeholder="Titolo..." name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="body">Contenuto</label>
                <textarea class="form-control rounded-0" id="body" rows="10" name="body">{{ $post->body }}</textarea>
              </div>
              
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
@endsection