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
                                <div class="mb-3 form-check">
                                    <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <a href="{{url('/forgot-password')}}">Forgot Password?</a><br>
                            Don't have an account yet?<a href="{{url('/register')}}"> Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection