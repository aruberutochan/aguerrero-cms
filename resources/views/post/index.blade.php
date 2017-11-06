@extends('layouts.app')

@section('content')

@component('post.components.list', ['title' => 'Alberto Guerrero', 'subtitle' => 'Desarrolla algo increible' , 'posts' => $posts])

@endcomponent


@endsection