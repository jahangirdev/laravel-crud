@extends('app')
@section('content')
<section class="dashboard py-5">
    <div class="container">
        <a href="{{route('class.create')}}" class="btn btn-primary">Add New</a>
        @if(Session::get('success')!==null)
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(Session::get('deleted')!==null)
            <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
                @foreach ($classes as $key=>$class)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$class->name}}</td>
                    <td>
                        <a href="{{ route('class.edit', Crypt::encryptString($class->id)) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('class.delete', Crypt::encryptString($class->id)) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr> 
                @endforeach
            </thead>
        </table>
        {{$classes->links()}}
    </div>
</section>
@endsection