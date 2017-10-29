@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="blog-title">Alberto Guerrero</h1>
    <p class="lead blog-description">Desarrolla cosas increíbles</p>
</div> 

<div class="container">
    <ul class="post-list list-unstyled">
        @foreach($posts as $post)
        <li>
            <h3> <a href="{{route('post.show', ['id' => $post->id])}}"> {{$post->title}} </a> </h3>
            <p> {{$post->summary}} </p>
        </li>
        @endforeach
    </ul>
</div>
@endsection