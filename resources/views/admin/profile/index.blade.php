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
    <p>User Profile</p>
</div> 
@endsection