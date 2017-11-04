@extends('layouts.app')

@section('content')

<h2> Create Post</h2>

@if(isset($post))
{{ Form::model($post, ['route' => ['post.update', $post], 'method' => 'put', 'files' => true]) }}   

@else
{{ Form::open(array('url' => '/admin/post', 'files' => true)) }} 
@endif
  

    {{Form::token()}}
    <div class="form-group">
        <!-- name -->
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'A descriptive title']) }}
    </div>
    <div class="form-group">
        <!-- name -->
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body',null, ['class' => 'form-control summernote' ]) }}
    </div>
    <div class="form-group">
        <!-- name -->
        {{ Form::label('uploaded_file', 'Image') }}
        {{ Form::file('uploaded_file', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <!-- name -->
        {{ Form::label('tags', 'Tags') }}
        {{ Form::text('tags',null, ['class' => 'form-control tags' ]) }}
    </div>
       
    <div class="form-group">
    {{ Form::submit('Add Post', ['class' => 'btn btn-success float-right']) }}
    </div>
   


{!! Form::close() !!}



@endsection