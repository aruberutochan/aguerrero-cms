@extends('layouts.app') @section('content')

<div class="row">
<div class="col-md-10">
    <h2>Post List</h2>
</div>
<div class="col-md">
    <a href="{{route('post.create')}}" class="btn btn-success float-right"> New Post</a>
</div>

</div>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="text-white bg-primary">
            <tr>
                <th>Id</th>
                <th>Post</th>
                <th>Author</th>
                <th>Date</th>
                <th>Status </th>
                <th>Action</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td> {{$post->user()->first()->name}} </td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->status}}</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="{{route('post.show', ['id' => $post->id])}}">
                        <span class="ion-ios-eye"></span> View
                    </a>
                </td>
                <td>
                    <a class="btn btn-outline-success btn-sm" href="{{route('post.edit', ['id' => $post->id])}}">
                        <span class="ion-ios-create"></span> Edit
                    </a>
                </td>
                <td>

                    {{ Form::open(array('route' => ['post.destroy', $post], 'method' => 'delete')) }}   

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