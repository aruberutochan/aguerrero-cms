@extends('layouts.app') @section('content')
<div class="container">
    <h2> Create Category </h2>

    @if(isset($category)) {{ Form::model($category, ['route' => ['category.update', $category], 'method' => 'put']) }} @else
    {{ Form::open(array('url' => '/admin/category')) }} @endif {{Form::token()}}

    <div class="form-group">
        <!-- name -->
        {{ Form::label('category', 'Category name') }} {{ Form::text('category',null, ['class' => 'form-control', 'placeholder' => 'Your category name']) }}
    </div>
      
    <div class="form-group">
        {{ Form::submit('Add Category', ['class' => 'btn btn-success float-right']) }}
    </div>



    {!! Form::close() !!}


</div>

@endsection