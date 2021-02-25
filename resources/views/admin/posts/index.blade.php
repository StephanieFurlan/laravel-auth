@extends('layouts.app')

@section('content')
<div class="container">
    <h1>I tuoi Posts</h1>
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div> 
    @endif
</div>
    
    
@endsection