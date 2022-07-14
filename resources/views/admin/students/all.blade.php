@extends('app')
@section('content')
<section class="dashboard py-5">
    <div class="container">
        <a href="{{route('students.create')}}" class="btn btn-primary">Add New</a>
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
                    <th>Name</th>
                    <th>Class</th>
                    <th>Roll</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach ($students as $key=>$student)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->class_name}}</td>
                    <td>{{$student->roll}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        <div class="d-flex justify-between">
                        <a href="{{ route('students.edit', Crypt::encryptString($student->id)) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('students.destroy', Crypt::encryptString($student->id)) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr> 
                @endforeach
            </thead>
        </table>
        {{$students->links()}}
    </div>
</section>
@endsection