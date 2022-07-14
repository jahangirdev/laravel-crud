@extends('app')
@section('content')
<section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                @error('password')
                    <div class="alert alert-success my-4">
                        Something went wrong
                    </div>
                @enderror
                    <div class="card my-5">
                        <div class="card-body">
                            <form action="{{route('password.update')}}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{$request->token}}">
                            <div class="mb-3">
                                <input name="email" type="hidden" value="{{$request->email}}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">New Password</label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    @endsection