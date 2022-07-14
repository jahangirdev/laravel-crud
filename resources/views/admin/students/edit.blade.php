@extends('app')
@section('content')
<section class="dashboard py-5">
    <div class="container">
        <a href="{{route('students.index')}}" class="btn btn-primary">All Students</a>
        @if(Session::get('success')!==null)
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="card my-5">
                        <div class="card-body">
                            <form action="{{route('students.update', $student->update_on)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="mb-3">
                                    <label for="student-name" class="form-label">Student Name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="student-name" value="{{ $student->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="roll" class="form-label">Roll</label>
                                    <input name="roll" type="number" class="form-control @error('roll') is-invalid @enderror" id="roll"  value="{{ $student->roll }}">
                                    @error('roll')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="class" class="form-label">Class</label>
                                    <select name="class_id" type="text" class="form-control @error('class_id') is-invalid @enderror" id="class">
                                        @foreach($classes as $class)
                                        <option value="{{$class->id}}" @if($class->id==$student->class_id) selected @endif>{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"  value="{{ $student->phone }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"  value="{{ $student->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update Class</button>
                            </form>
                        </div>
                    </div>
    </div>
</section>
@endsection