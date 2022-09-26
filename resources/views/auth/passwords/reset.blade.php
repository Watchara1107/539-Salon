@extends('layouts.master_authen')
@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="text-center">
            <span><img src="{{ asset('forntend/assets/images/539salonlogo.png') }}" alt=""></span> <br><br><br>
        </div>
        <div class="form-group">
            <input type="email" class="form-control item" id="email" name="email"
                value="{{ $email ?? old('email') }}" placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" id="password-confirm" name="password_confirmation"
                placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Reset Password</button>
        </div>
    </form>
    <div class="social-media">
       

    </div>
@endsection
