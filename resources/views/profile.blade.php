@extends('layout.master')

@section('title')
    profile
@endsection


@section('content')

 <div class="mt-5">.</div>
    <div class="hero mt-3">
        <div class="wave"></div>
        <div class="profile-header text-center">
            <img src="{{ asset($user->photo) }}" class="rounded-circle profile-pic" alt="Profile Picture" onclick="alert('Profile picture clicked!')">
            <h1 class="mt-3">{{ $user->name }}</h1>
            <p class="lead">Creative Skill Enthusiast</p>
        </div>
    </div>
    <section class="detail">
        <div class="container">
            <div class="row">
                <div class="col-md-7 info">
                    <h3>About Me</h3>
                    <p>{{ $user->about ?? 'No about information available' }}</p>
                    <h3>Skills to Share</h3>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">{{ $user->sellist1 ?? 'Not Selected' }}</li>
                    </ul>
                    <h3>Skills I Want to Learn</h3>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">{{ $user->sellist2 ?? 'Not Selected' }}</li>
                    </ul>
                    <h3>Connect with me</h3>
                    <ul class="list-group mb-4">
                        @if(isset($user))
                            <li class="list-group-item">{{ $user->phone ?? 'Phone number not available' }}</li>
                        @else
                            <li class="list-group-item text-muted">User not found</li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-5">
                    <div class="sidebar">
                        <h3>Facilities I Provide</h3>
                        <div class="facility-item">
                            {{ $user->facilities ?? 'No facilities listed' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="changing text-center mt-4">
                <button type="button" class="btn btn-apply fw-bolder btn-end" onclick="if(confirm('Are you sure you want to logout?')) window.location.href='contact';">Logout</button>
            </div>
        </div>
    </section>
    <br><br>
@endsection