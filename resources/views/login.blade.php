@extends('layout.masterp')
@section('content')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

<br><br>


<h3 class="form-heading">Login to Your Account</h3>

<div class="login-wrapper">
    <form action="{{ route('handle.auth') }}" method="POST" class="login-form">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" required class="form-input">

        <label for="password">Password:</label>
        <input type="password" name="password" required class="form-input">

        <button type="submit" class="btn-login">Login</button>
    </form>

    <p class="register-text">Don't have an account?</p>
    <a href="{{ route('joinUs') }}" class="register-btn">
        <button type="submit" class="new">Register Now</button>
    </a>
</div>
<div class="login-footer">
@if($errors->any())
    <p style="color: red;">{{ $errors->first() }}</p>
@endif
</div>

@endsection
