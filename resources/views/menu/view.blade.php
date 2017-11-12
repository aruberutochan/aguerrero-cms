@extends('layouts.app') @section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10">
            <h2>{{$menu->menu}}</h2>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="text-white bg-primary">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Url</th>                
                    <th>Weight</th>
                    <th>Css Class</th>
                    <th>Css Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $link)

                <tr>
                    <td>{{$link->id}}</td>
                    <td>{{$link->name}}</td>
                    <td>{{$link->url}}</td>                
                    <td>{{$link->weight}}</td>
                    <td>{{$link->css_class}}</td>
                    <td>{{$link->css_id}}</td>
                    <td>

                        {{ Form::open(array('route' => ['menu.deleteLink', $menu , $link], 'method' => 'delete')) }} 
                            {{Form::token()}} 
                            {{Form::button('<span class="ion-ios-trash"></span> Delete', 
                                ['type' => 'submit', 
                                'class' => 'btn btn-outline-danger btn-sm']) 
                            }}
                        {{ Form::close()}}

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div class="container">
    <h2>Add Links to Menu</h2>


    {{ Form::open(array('url' => 'admin/menu/' . $menu->id . '/addlink')) }} {{Form::token()}} {{Form::hidden('menu',$menu) }}
    {{Form::hidden('menu_id',$menu->id) }}
    <div class="form-group row">
        <!-- name -->
        {{ Form::label('url', 'Url', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('url',null, ['class' => 'form-control', 'placeholder' => '/post/laravel']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('name', 'Link Name', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Item Name']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('weight', 'Position', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::number('weight',0, ['class' => 'form-control', 'placeholder' => 'position']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('css_class', 'Class Css', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('css_class',null, ['class' => 'form-control', 'placeholder' => 'Style Css Class']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('css_id', 'Id Css', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('css Id',null, ['class' => 'form-control', 'placeholder' => 'Style Css ID']) }}
        </div>
    </div>



    <div class="form-group">
        {{ Form::submit('Add link', ['class' => 'btn btn-success float-right']) }}
    </div>



    {!! Form::close() !!}
</div>

@endsection