@extends('layouts.app') @section('content')

<div class="row">
    <div class="col-md-10">
        <h2>Category List</h2>
    </div>
</div>
{{ Form::open(array('url' => '/admin/category')) }}

{{Form::token()}}
<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <!-- name -->
            {{ Form::text('category',null, ['class' => 'form-control', 'placeholder' => 'Your category name']) }}
        </div>
    
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::submit('Add Category', ['class' => 'btn btn-success float-right']) }}
        </div>
    </div>
</div>


    
      




    {!! Form::close() !!}


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="text-white bg-primary">
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Group</th>
                <th>Action</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{ $category->group->name}}</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="{{route('category.show', ['id' => $category->id])}}">
                        <span class="ion-ios-eye"></span> View
                    </a>
                </td>
                <td>
                    <a class="btn btn-outline-success btn-sm" href="{{route('category.edit', ['id' => $category->id])}}">
                        <span class="ion-ios-create"></span> Edit
                    </a>
                </td>
                <td>

                    {{ Form::open(array('route' => ['category.destroy', $category], 'method' => 'delete')) }} {{Form::token()}} {{Form::button('
                    <span class="ion-ios-trash"></span> Delete', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm']) }} {{ Form::close()
                    }}

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection