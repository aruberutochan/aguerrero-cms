<div class="row">
    <div class="col-md-10">
        <h2>{{$menu->menu}}</h2>
    </div>
</div>

{{ Form::open(array('url' => '/admin/menu')) }}

{{Form::token()}}
<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <!-- name -->
            {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Your '.$menu->name.'\'s menu entry']) }}
            {{ Form::hidden('menu_id',$menu->id) }}
        </div>
    
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::submit('Add link', ['class' => 'btn btn-success float-right']) }}
        </div>
    </div>
</div>

{!! Form::close() !!}


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
                <td>{{$link->action}}</td>
                <td>

                    {{ Form::open(array('route' => ['link.destroy', $link], 'method' => 'delete')) }} 
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