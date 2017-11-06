@extends('layouts.app')

@section('content')



@component('post.components.list', ['title' => $taxonomy->term->name, 'subtitle' => $taxonomy->taxonomy , 'posts' => $posts])

@endcomponent


@endsection