@extends('layout.master')

@section('title')
trainers
    
@endsection
@section('styles')
   <link rel="stylesheet" href="{{asset('css/trainers.css')}}"> 
@endsection
@section('content')
<div class="hero-section">
        <div class="overlay"></div>
        <div class="content">
           <h1>Our Trainers</h1>
        <p>Our dedicated team of experts and community-driven<br>moderators ensure a seamless skill exchange experience.</p>
        <p> Their knowledge and guidance enhance user<br>interactions and creating valuable learning opportunities.</p>
    </div>

        </div>

 <!-- need and priority -->
<div class="container my-5">
    <div class="row">
        <!-- Left section -->
        <div class="col-md-8-text-center col-lg-6">
            <div class="custom-box mt-4">
                <h5 style="color: #517de4;" class="pt-5 ps-4">Your need, our priority</h5>
                <h2 class=" px-4 pb-3 ">Whether you are</h2>
                <div class="row mt-4 " >
                    <div class="heading col-6 mb-1 ps-4">
                        <p class="p-4" style="color: white">Graphic designer</p>
                    </div>
                    <div class=" heading  pe-4 col-6 mb-1">
                        <p class="p-4" style="color: white">Developer</p>
                    </div>
                    <div class="col-6 heading mb-5 ps-4">
                        <p class="p-4" style="color: white">Cook</p>
                    </div>
                    <div class="heading col-6 mb-5 pe-4">
                        <p class="p-4" style="color: white">Beauty Artist</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right section -->
        <div class="col-lg-6 col-md-8-text-center align-items-center pt-4 ps-4 mb-5">
            <p>
                We believe that exchanging skills is a powerful way to grow, which is why we promote a collaborative approach where individuals share their expertise and gain new abilities in return. Whether you’re offering technical knowledge, creative insights, or practical experience, skill exchange creates a dynamic learning environment that benefits everyone involved.
                <br><br>
                By embracing this mutual learning process, you not only expand your own skill set but also contribute to a network of continuous development. Our goal is to foster meaningful exchanges that enhance personal and professional growth for all participants.
            </p>
        </div>
    </div>
</div>

<hr class="custom-hr">

<!-- Process Section -->
<div class="container process-section">
    <h2 class="process-title">Our Process</h2>

    <!-- Timeline -->
    <div class="stright_line d-flex justify-content-between">
        <div class="step fs-1"><span>01</span></div>
        <div class="step fs-1"><span>02</span></div>
        <div class="step fs-1"><span>03</span></div>
    </div>

    <!-- Process Boxes -->
    <div class="row g-4" >
        <div class="col-md-4">
            <div class="process-box">
                <h5><strong>Profile Creation</strong></h5>
                <p>Detailed profiling to highlight offered or sought-after skills, ensuring clarity in expertise and opportunities.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="process-box">
                <h5><strong>Targeted Networking</strong></h5>
                <p>Strategic engagement with like-minded individuals for structured skill exchange and mutual evaluation.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="process-box">
                <h5><strong>Collaboration Formalization</strong></h5>
                <p>Formalization of collaborations through agreements while upholding confidentiality and ethical standards.</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<hr class="custom-hr">
<!--trainers review -->

<div class="container-fluid testimonial-section">
    <!-- Title -->
    <div class="container mt-5 p-4">
    <h2 class="flipCard-title">Meet Our Trainers</h2>
    </div>

    <!-- Bootstrap Carousel -->
    <div class="container py-5 position-relative">
  {{-- <h2 class="text-center mb-4">Meet Our Trainers</h2> --}}

  <div id="trainerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <!-- First Slide -->
      <div class="carousel-item active">
        <div class="row g-4">
    @foreach($feedbacks as $feedback)
        <div class="col-md-3">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <!-- Front Side -->
                    <div class="flip-card-front">
                        <h5>{{ $feedback->firstname }} {{ $feedback->lastname }}</h5>
                        <p>User Feedback</p>
                    </div>
                    <!-- Back Side -->
                    <div class="flip-card-back">
                        <h5>Feedback</h5>
                        <p>{{ $feedback->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
      </div>

    </div>

    <!-- Custom Controls -->
    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#trainerCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#trainerCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button> --}}
  </div>
</div>
    
@endsection