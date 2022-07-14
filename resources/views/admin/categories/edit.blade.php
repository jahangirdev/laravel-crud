@extends('app')
@section('content')
<section class="dashboard py-5">
    <div class="container">
        <a href="{{route('categories.index')}}" class="btn btn-primary">All Categories</a>
        @if(Session::get('success')!==null)
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="card my-5">
            <div class="card-body">
                <form action="{{route('categories.update', $category->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="mb-3">
                        <label for="category-name" class="form-label">Category Name</label>
                        <input name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" id="category-name" value="{{$category->category_name}}">
                        @error('category_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection