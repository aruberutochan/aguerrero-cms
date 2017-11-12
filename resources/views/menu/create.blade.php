@extends('layouts.app') @section('content')
<div class="container">
<h1>Create new Menu</h1>
    @if(isset($menu)) 
        {{ Form::model($menu, ['route' => ['menu.update', $menu], 'method' => 'put']) }}     
    @else
        {{ Form::open(array('url' => '/admin/menu')) }} 
    
    @endif 
    {{Form::token()}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <!-- name -->
                {{ Form::text('menu',null, ['class' => 'form-control', 'placeholder' => 'Your new menu']) }}
            </div><div class="form-group">

                {{ Form::textarea('description',null, ['class' => 'form-control', 'rows'=>"3", 'maxlength' => 150, 'placeholder' => 'Describe your menu']) }}
            </div><div class="form-group">
                {{ Form::select('region', ['none' => 'None', 'primary' => 'Primary', 'sidebar' => 'SideBar', 'footer' => 'Footer'], 'None') }}
            
            </div><div class="form-group">
                {{ Form::text('css_class',null, ['class' => 'form-control', 'placeholder' => 'Css Class']) }}
            </div><div class="form-group">
                {{ Form::text('css_id',null, ['class' => 'form-control', 'placeholder' => 'Css Id']) }}
                
            </div>
        
        </div>
        <div class="col-md-12">
             <div class="form-group float-right">
                {{ Form::submit('Add Menu', ['class' => 'btn btn-success']) }}
            </div>
        </div>

           

    </div>

    {!! Form::close() !!}
</div>
@endsection