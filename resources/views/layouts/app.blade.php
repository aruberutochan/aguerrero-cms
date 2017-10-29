@if(Request::segment(1) == 'admin')
    @include('layouts.admin.dashboard')

@else
    @include('layouts.frontend.blog')

@endif