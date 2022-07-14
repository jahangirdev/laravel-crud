@extends('app')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4>@if(Session::has('message')) {{Session::get('message').' Please check your email inbox.'}} @else Please verify your email @endif</h4>
                <p>Didn't receive a verification email at {{Auth::user()->email}}?</p>
                <a class="btn btn-success" href="{{route('verification.send')}}">Resend Verification E-mail</a>
            </div>
        </div>
    </div>
</section>
@endsection