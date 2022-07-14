@extends('app')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                    <div class="card my-5">
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Full Name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="userName">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" id="confirmPassword">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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