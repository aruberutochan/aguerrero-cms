@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="blog-title">Alberto Guerrero</h1>
    <p class="lead blog-description">Desarrolla cosas increíbles</p>
</div> 

<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
</div>

@endsection
