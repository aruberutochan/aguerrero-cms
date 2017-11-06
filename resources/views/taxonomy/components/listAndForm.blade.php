<div class="row">
    <div class="col-md-10">
        <h2>{{$taxonomy}}</h2>
    </div>
</div>

{{ Form::open(array('url' => '/admin/taxonomy')) }}

{{Form::token()}}
<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <!-- name -->
            {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Your '.$taxonomy.' name']) }}
            {{ Form::hidden('taxonomy',$taxonomy) }}
        </div>
    
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::submit('Add ' . $taxonomy, ['class' => 'btn btn-success float-right']) }}
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
                <th>Slug</th>                
                <th>Date</th>
                <th>Action</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($taxGroup as $tax)

            <tr>
                <td>{{$tax->id}}</td>
                <td>{{$tax->term->name}}</td>
                <td>{{$tax->term->slug}}</td>
                <td>{{$tax->created_at}}</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="{{route('taxonomy.show', ['id' => $tax->id])}}">
                        <span class="ion-ios-eye"></span> View
                    </a>
                </td>
                <td>

                    {{ Form::open(array('route' => ['taxonomy.destroy', $tax], 'method' => 'delete')) }} {{Form::token()}} {{Form::button('
                    <span class="ion-ios-trash"></span> Delete', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm']) }} {{ Form::close()
                    }}

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>