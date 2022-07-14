@extends('app')
@section('content')
<section class="dashboard py-5">
    <div class="container">
        <a href="{{route('classes.all')}}" class="btn btn-primary">All Classes</a>
        @if(Session::get('success')!==null)
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="card my-5">
                        <div class="card-body">
                            <form action="{{route('class.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="class-name" class="form-label">Class Name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="class-name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Create Class</button>
                            </form>
                        </div>
                    </div>
    </div>
</section>
@endsection