@extends('layout.master')

@section('title')
    profile
@endsection

@section('styles')
    <link rel="stylesheet" href="css/profile.css">
@endsection
@section('content')
    
    <div class="mt-5">.</div>
    <div class="hero mt-3">
        <div class="wave"></div>
        <div class="profile-header text-center">
            <img src="{{ asset($user->photo) }}" class="rounded-circle profile-pic" alt="Profile Picture">
            <h1 class="mt-3">{{ $user->name }}</h1>
            <p class="lead">Creative Skill Enthusiast</p>
            
        </div>
    </div>
    <section class="detail">
        <div class="container">
            <div class="row">
                <div class="col-md-7 info">
                    <h3>About Me</h3>
                    <p>
                        {{ $user->about}}
                        {{-- Passionate designer with 5+ years of experience in creating stunning visual content. 
                        Looking to exchange skills with other creative minds and learn new techniques! --}}
                    </p>

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
                        <li class="list-group-item">{{ $user->number }}</li>
                        
                    </ul>
                </div>
                <div class="col-md-5">
                    <div class="sidebar">
                        <h3>Facilities I Provide</h3>
                        <div class="facility-item">
                            {{ $user->facility }}
                            {{-- <h5>Workspace</h5>
                            <p>Fully equipped design studio with high-end PC and drawing tablet</p>
                            <h5>Equipment</h5>
                            <p>Professional DSLR camera and lighting setup</p>
                            <h5>Software</h5>
                            <p>Latest Adobe Creative Suite subscription</p>
                            <h5>Learning Materials</h5>
                            <p>Collection of design books and online course access</p> --}}
                        </div>
                        {{-- <div class="facility-item">
                            
                        </div>
                        <div class="facility-item">
                            
                        </div>
                        <div class="facility-item">
                            
                        </div> --}}
                    </div>

                </div>
            </div>
            <div class="changing">
                    <button type="submit" class="btn btn-apply fw-bolder btn-end" >logout</button>
                </div>
        </div>
    
    </section>
    <br><br>
@endsection