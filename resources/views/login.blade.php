@extends('layout.masterpage')
@section('title')
    login
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="login-wrapper">
    <h3 class="form-heading">Login to Barter Brains</h3>

    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" class="form-input" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" name="password" class="form-input" placeholder="Enter your password" required>

        <button type="submit" class="btn-login">Login</button>
    </form>

    <p class="register-text">Don’t have an account?</p>
    <a href="{{ route('joinUs') }}">
        <button type="button" class="new">Register Now</button>
    </a>

    <div class="login-footer">
        @if($errors->any())
            <p>{{ $errors->first() }}</p>
        @endif
    </div>
</div>
@endsection
