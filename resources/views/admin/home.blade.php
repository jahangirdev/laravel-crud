@extends('app')
@section('content')
<section class="dashboard py-5">
    <div class="container">
        @if(Session::has('verification_success'))
            <div class="alert alert-success">
                <p class="alert-text">{{Session::get('verification_success')}}</p>
            </div>
        @endif
        <div class="h2">Hello, {{Auth::user()->name}}</div>
        <a href="{{route('classes.all')}}" class="btn btn-primary">All Classes</a>
        <a href="{{route('students.index')}}" class="btn btn-danger">All Students</a>
        <a href="{{route('categories.index')}}" class="btn btn-danger">All Categories</a>
    </div>
</section>
@endsection