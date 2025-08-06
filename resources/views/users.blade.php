@extends('layout.master')
@section('title')
    Users
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection

@section('content')
<div class="container">
    <h2 class="page-title">Connect with Other Learners</h2>

    <div class="user-grid">
        @foreach ($users as $user)
            <div class="user-card">
                <img src="{{ asset('uploads/' . $user->profile) }}" alt="Profile Image" class="profile-img">

                <h3>{{ $user->name }}</h3>
                <p><strong>Teach:</strong> {{ $user->skill_teach }}</p>
                <p><strong>Learn:</strong> {{ $user->skill_learn }}</p>

                <form >
                    
                    <button type="submit" class="friend-btn">Send Friend Request</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

@endsection
