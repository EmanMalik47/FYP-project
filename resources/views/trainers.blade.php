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
                <h2 class="fw-bold px-4 pb-3 fs-1">Whether you are</h2>
                <div class="row mt-4 ">
                    <div class="heading col-6 mb-1 ps-4">
                        <p class="p-4">Graphic designer</p>
                    </div>
                    <div class=" heading  pe-4 col-6 mb-1">
                        <p class="p-4">Developer</p>
                    </div>
                    <div class="col-6 heading mb-5 ps-4">
                        <p class="p-4">Cook</p>
                    </div>
                    <div class="heading col-6 mb-5 pe-4">
                        <p class="p-4">Beauty Artist</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right section -->
        <div class="col-lg-6 col-md-8-text-center align-items-center pt-4 ps-4 mb-5">
            <p style="font-size: 22px;">
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
    <h2 class="testimonial-title">Meet Our Trainers</h2>
    </div>

    <!-- Bootstrap Carousel -->
    <div class="container py-5 position-relative">
  {{-- <h2 class="text-center mb-4">Meet Our Trainers</h2> --}}

  <div id="trainerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <!-- First Slide -->
      <div class="carousel-item active">
        <div class="row g-4">
          <!-- Trainer 1 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Mahrukh</h5>
                  <p>Backend Languages Instructor</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> PHP laravel<br> 2+ Years Exp<br> Debugging feels like solving mysteries for her</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Trainer 2 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Tahreem Azeem</h5>
                  <p>Graphics Designer</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> Photoshop Pro<br> 3+ Years Exp<br> Loves Digital Art</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Trainer 3 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Fizza Lukhvera</h5>
                  <p>Video Editor</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> Premiere Pro<br> 3+ Years Exp<br> Lo-Fi Lover</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Trainer 4 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Amna Aslam</h5>
                  <p>Cook</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> Traditional Cuisine<br> 5+ Years Exp<br> Famous for Biryani</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Slide -->
      <div class="carousel-item">
        <div class="row g-4">
          <!-- Trainer 5 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Warda Khan</h5>
                  <p>Mehndi Artist</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> Arabic & Indian Mehdni<br> 6+ Years Exp<br> Available at every Eid</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Trainer 6 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Farzana Sohail</h5>
                  <p>Hair Stylist</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> Hair Coloring, Styling, Bridal Makeovers<br> 4+ Years Exp<br> Can create 5 hairstyles in under 30 minutes</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Trainer 7 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Shoaib Anwar</h5>
                  <p>Musical Instruments Trainer</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> Guitar & Violin<br> 5+ Years Exp<br> Can play blindfolded</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Trainer 8 -->
          <div class="col-md-3">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <h5>Ayesha Akhter</h5>
                  <p>Front-end Languages Instructor</p>
                </div>
                <div class="flip-card-back">
                  <h5>Skills & Fun Fact</h5>
                  <p> HTML, CSS, JavaScript<br> 3+ Years Exp<br> Writes code faster than she types messages</p>
                </div>
              </div>
            </div>
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


      <!--   <div class="carousel-indicators">
            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
        </div> -->

        <!-- Carousel Inner -->
        {{-- <div class="carousel-inner pb-4">
            <!-- First Slide (Shows 3-4 Testimonials at a time) -->
            <div class="carousel-item active">
                <div class="row gx-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“Outsourcing our 3D rendering needs with Cadsourcia was a real turning point. We are focusing on our core business.”</p>
                            <p class="testimonial-author">Sir Usman</p>
                            <p class="testimonial-role">Networking Manager</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“Working with Cadsourcia has been a real asset for our agency. Their team facilitated our transition to a more advanced digitalization process.”</p>
                            <p class="testimonial-author">Tahreem Azeem</p>
                            <p class="testimonial-role">Graphics Designer</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-none d-lg-block">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“We have worked with Cadsourcia on several residential projects. Their team of BIM modelers has made a significant difference in our work.”</p>
                            <p class="testimonial-author">Fizza Lukhvera</p>
                            <p class="testimonial-role">Vedio Editor</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-none d-lg-block">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“Thanks to the flexibility of Cadsourcia, our projects streamlined perfectly, improving collaboration between teams.”</p>
                            <p class="testimonial-author">Amna Aslam</p>
                            <p class="testimonial-role">Cook</p>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Second Slide (More Testimonials) -->
               {{-- <div class="carousel-item active">
                <div class="row gx-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“Outsourcing our 3D rendering needs with Cadsourcia was a real turning point. We are focusing on our core business.”</p>
                            <p class="testimonial-author">Farzana Sohail</p>
                            <p class="testimonial-role">Hair Stylist</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“Working with Cadsourcia has been a real asset for our agency. Their team facilitated our transition to a more advanced digitalization process.”</p>
                            <p class="testimonial-author">Shoaib Anwar</p>
                            <p class="testimonial-role">Web Developer</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-none d-lg-block">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“We have worked with Cadsourcia on several residential projects. Their team of BIM modelers has made a significant difference in our work.”</p>
                            <p class="testimonial-author">Warda Khan</p>
                            <p class="testimonial-role">Mehndi Artist</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-none d-lg-block">
                        <div class="testimonial-card">
                            <p class="testimonial-text">“Thanks to the flexibility of Cadsourcia, our projects streamlined perfectly, improving collaboration between teams.”</p>
                            <p class="testimonial-author">Eman Malik</p>
                            <p class="testimonial-role">DSA Coder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Carousel Controls -->
        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" style="top: 24px; left: -100px;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" style="top: 24px; right: -100px;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div> --}}
    
@endsection