@extends('layouts.app')

@section('menu-item')
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.posts.index') }}">Tutti i Post</a>
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
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" placeholder="Titolo..." name="title" value="{{ old('title')}}">
            </div>
            <div class="form-group">
                <label for="body">Contenuto</label>
                <textarea class="form-control rounded-0" id="body" rows="10" name="body">{{ old('body' )}}</textarea>
              </div>
            <div class="form-group">
                <label for="img_path">Immagine</label>
                <input class="form-control" type="file" name="img_path" id="img_path" accept="image/*">
            </div>  
            <button class="btn btn-success" type="submit">Crea</button>
        </form>
    </div>
@endsection