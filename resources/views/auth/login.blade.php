@extends('layouts.master_authen')
@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="text-center">
        <span><img src="{{ asset('forntend/assets/images/539salonlogo1.png') }}" alt=""></span> <br><br><br>
    </div>
    <div class="form-group">
        <input type="email" class="form-control item" id="email" name="email" placeholder="Email">
    </div> 
    <div class="form-group">
        <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block create-account">Login</button>
    </div>
</form>
<div class="social-media">
    <p><a href="{{ route('password.request') }}">Forgot Your Password?</a></p>
    <p><a href="{{ route('register') }}">Register</a></p>
   
</div>
@endsection


