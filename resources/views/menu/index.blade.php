@extends('layouts.app') @section('content')
<div class="row">
<div class="col-md-10">
    <h2>Menu List</h2>
</div>
<div class="col-md">
    <a href="{{route('menu.create')}}" class="btn btn-success float-right"> New Menu</a>
</div>

</div>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="text-white bg-primary">
            <tr>
                <th>Id</th>
                <th>Menu</th>
                <th>Description</th>
                <th>Css Class</th>
                <th>Css ID</th>
                <th>Parent ID </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->menu}}</td>
                <td>{{$menu->description}} </td>
                <td>{{$menu->css_class}}</td>
                <td>{{$menu->css_id}}</td>
                <td>{{$menu->parent_id}}</td>
                <td>
                    <a class="btn btn-outline-success btn-sm" href="{{route('menu.show', ['id' => $menu->id])}}">
                        <span class="ion-ios-create"></span> Add Links
                    </a>
                </td>
                <td>
                    <a class="btn btn-outline-success btn-sm" href="{{route('menu.edit', ['id' => $menu->id])}}">
                        <span class="ion-ios-create"></span> Edit
                    </a>
                </td>
                <td>

                    {{ Form::open(array('route' => ['menu.destroy', $menu], 'method' => 'delete')) }}   

                        {{Form::token()}}
                        {{Form::button('<span class="ion-ios-trash"></span> Delete', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm']) }}
                    
                    {{ Form::close() }}

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection