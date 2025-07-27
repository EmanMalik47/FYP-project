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
            <img src="images/pp.jfif" class="rounded-circle profile-pic" alt="Profile Picture">
            <h1 class="mt-3">Tahreem Azeem</h1>
            <p class="lead">Creative Skill Enthusiast</p>
            
        </div>
    </div>
    <section class="detail">
        <div class="container">
            <div class="row">
                <div class="col-md-7 info">
                    <h3>About Me</h3>
                    <p>
                        Passionate designer with 5+ years of experience in creating stunning visual content. 
                        Looking to exchange skills with other creative minds and learn new techniques!
                    </p>

                    <h3>Skills to Share</h3>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">Responsive Web Design</li>
                        <li class="list-group-item">Adobe Photoshop & Illustrator</li>
                        <li class="list-group-item">Portrait Photography</li>
                    </ul>

                    <h3>Skills I Want to Learn</h3>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">Video Editing</li>
                        <li class="list-group-item">3D Modeling</li>
                        <li class="list-group-item">UI/UX Design</li>
                    </ul>

                    <h3>Connect with me</h3>
                    <ul class="list-group mb-4">
                        <li class="list-group-item">xxxx-xxxxxxx</li>
                        
                    </ul>
                </div>
                <div class="col-md-5">
                    <div class="sidebar">
                        <h3>Facilities I Provide</h3>
                        <div class="facility-item">
                            <h5>Workspace</h5>
                            <p>Fully equipped design studio with high-end PC and drawing tablet</p>
                        </div>
                        <div class="facility-item">
                            <h5>Equipment</h5>
                            <p>Professional DSLR camera and lighting setup</p>
                        </div>
                        <div class="facility-item">
                            <h5>Software</h5>
                            <p>Latest Adobe Creative Suite subscription</p>
                        </div>
                        <div class="facility-item">
                            <h5>Learning Materials</h5>
                            <p>Collection of design books and online course access</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
    </section>
    <br><br>
@endsection