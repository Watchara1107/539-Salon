@extends('layouts.master_authen')
@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="text-center">
            <span><img src="{{ asset('forntend/assets/images/539salonlogo.png') }}" alt=""></span> <br><br><br>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group">
            <input type="email" class="form-control item" id="email" name="email" placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Reset Password</button>
        </div>
    </form>
    <div class="social-media">
    </div>
@endsection
