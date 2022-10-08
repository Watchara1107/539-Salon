@extends('layouts.master_authen')
@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="text-center">
        <span><img src="{{ asset('forntend/assets/images/539salonlogo1.png') }}" alt=""></span> <br><br><br>
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="name" name="name" placeholder="Name">
    </div> 
    <div class="form-group">
        <input type="email" class="form-control item" id="email" name="email" placeholder="Email">
    </div> 
    <div class="form-group">
        <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block create-account">Create Account</button>
    </div>
</form>
<div class="social-media">
    <a href="{{ route('login') }}">Login</a>
   
</div>
@endsection


