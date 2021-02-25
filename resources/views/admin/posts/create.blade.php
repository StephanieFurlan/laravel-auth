@extends('layouts.app')

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
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" placeholder="Titolo..." name="title">
            </div>
            <div class="form-group">
                <label for="body">Contenuto</label>
                <textarea class="form-control rounded-0" id="body" rows="10" name="body"></textarea>
              </div>
              
            <button class="btn btn-success" type="submit">Crea</button>
        </form>
    </div>
@endsection