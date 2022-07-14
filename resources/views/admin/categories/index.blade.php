@extends('app')
@section('content')
<section class="dashboard py-5">
    <div class="container">
        <a href="{{route('categories.create')}}" class="btn btn-primary">Add New</a>
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
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $key=>$category)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->category_slug}}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                        <form class="d-inline" action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </thead>
        </table>
        {{$categories->links()}}
    </div>
</section>
@endsection