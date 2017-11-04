@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-2">
            @foreach($allAttachments as $attach)       
                <img src="{{$attach->url}}" alt="{{$post->title}}" class="img-fluid">                
            @endforeach    
        </div>
        <div class="col-10">
            <h2> {{ $post->title}}</h2>
        </div>
        <div class="col-12">
            <p> {!! $post->body !!}</p>
        </div>
    </div>    
</div>

@endsection