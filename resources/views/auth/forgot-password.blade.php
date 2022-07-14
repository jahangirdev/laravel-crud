@extends('app')
@section('content')
<section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                @if (session('status'))
                    <div class="alert alert-success my-4">
                        {{ session('status') }}
                    </div>
                @endif
                    <div class="card my-5">
                        <div class="card-body">
                            <form action="{{url('/forgot-password')}}" method="post">
                                @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    @endsection