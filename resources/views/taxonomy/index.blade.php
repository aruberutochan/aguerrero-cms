@extends('layouts.app') @section('content')

@if($taxonomies)
    @foreach($taxonomies as $taxName => $taxGroup) 

        @component('taxonomy.components.listAndForm', ['taxonomy' => $taxName,  'taxGroup' => $taxGroup])

        @endcomponent            

    @endforeach
@endif

@endsection