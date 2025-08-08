@extends('layout.master')
@section('title')
certificates
    
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/certificates.css')}}">
@endsection
@section('content')
@php
    $skills = is_array($userSkills) ? $userSkills : [];
@endphp
<div class=" header-section pt-4">
		<div class="overlay"></div>
		<div class="description text-center text-white pt-4">
			<h1>Digital Certificates</h1>
			<p>Our secure digital certificates authenticate skill exchanges,<br> ensuring credibility and trust within the community.</p>

			<p>By verifying achievements and expertise, they enhance user<br>confidence and create valuable learning opportunities.</p>
		</div>
	</div>
	<br><br>
	<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 our-certificates">
				<h1 class="display-4" >Services</h1>
				<h2>Earn verified recognition, and build credibility with our secure digital certificates!</h2>

				<p>At Barter Brains, we go beyond just facilitating skill exchanges—we empower users with verified recognition for their learning achievements. Our secure digital certificates authenticate completed skill exchanges, providing credibility and trust within the community.</p>
				<p>By earning a digital certificate, users showcase their expertise, enhance their professional profiles, and gain valuable recognition for their acquired skills. With our commitment to innovation and user growth, we ensure that every learning experience is not just meaningful but also officially acknowledged.</p>
			</div>
		</div>
	</div>
	
</section>
<br>
<hr class="custom-hr">
<br><br>
<!-- certificates --->
<div class="container">
	<div class="row">
		<div class="col-md-6 pt-5 cer-steps">
			<h1>
			    <img src="images/circle.png" width="88px">Certification Steps</h1>
			<p>Barter Brains offers a transparent and rewarding certification process, where every learner can thrive. From your first skill exchange, you will embark on a structured journey to validate and showcase your expertise.<br> You will go through engaging assessments, peer reviews, and expert evaluations to ensure credibility and growth.</p>
		</div>
		<div class="col-md-6 ">
			<div class="custom-accordion">
        <div class="accordion" id="customAccordion">

            <!-- step # 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Complete a Skill Exchange 
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#customAccordion">
                    <div class="accordion-body">
                        Successfully participate in a skill exchange session by either learning or teaching a skill.
                    </div>
                </div>
            </div>

            <!-- step # 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Verification & Assessment
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#customAccordion">
                    <div class="accordion-body">
                        The platform or the skill provider verifies the completion of the exchange, which may include peer reviews, assessments, or feedback.
                    </div>
                </div>
            </div>

            <!-- step # 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Certificate Generation
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#customAccordion">
                    <div class="accordion-body">
                        Once verified, the system generates a digital certificate with details such as the skill learned, date of completion, and authentication features.
                    </div>
                </div>
            </div>

            <!-- step # 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Access & Sharing
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#customAccordion">
                    <div class="accordion-body">
                        Users can download, share, or showcase their digital certificate on their profile, LinkedIn, or other professional platforms.
                    </div>
                </div>
            </div>

        </div>
    </div>
		</div>
	</div>
    
</div>
<br>
<hr class="custom-hr">
<br><br>

<!-- getting certificate -->

<div class="container get-cer mt-5 mb-5 block">

        <h1 style="font-size: 55px; ">  
            <img src="images/circle.png" class="circle-img ">Get Digital Certificate</h1>
        <p>Submit your details and receive your digital certificate instantly! Validate your skills and showcase your expertise with a recognized credential. Get started now and take the next step in your learning journey!</p>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="cer-box">
                   
                    <div class="certificate-preview">
                    	<img src="images/cooking-card.jpeg" class="rounded img-fluid" width="200px" >
                    </div>
                    <div class="card-body"> 
                        <h5 class="card-title pt-2"><strong>COOKING</strong></h5>
                        <p class="card-text">Completed a course of hands-on cooking training, mastering essential techniques, recipes, and kitchen skills.</p>
                        @if(in_array('Cooking', $skills))
                            <button class="view-cer px-4 py-2 rounded-pill"
                                style="background-color: #1f3d85; color: aliceblue;"
                                onclick="window.location.href='{{ route('getCertificate', ['skill' => 'Cooking']) }}';">
                                Get Certificate
                            </button>
                        @else
                            <button class="view-cer px-4 py-2 rounded-pill" style="background-color: grey; color:white;" disabled>
                                Not Available
                            </button>
                        @endif
                        
                        
                        {{-- <button class="view-cer  px-4 py-2 rounded-pill" type="button" style="background-color: #1f3d85; color: aliceblue;" onclick="window.location.href='getCertificate';">Get Certificate</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cer-box">
                   
                    <div class="certificate-preview">
                    	<img src="images/music-card.jpeg" class="rounded img-fluid" width="200px" height="195px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pt-2"><strong>MUSIC</strong></h5>
                        <p class="card-text">Completed a comprehensive music training, covering theory, composition, and performance techniques.</p>
                        @if(in_array('Musical Instruments', $skills))
                            <button class="view-cer px-4 py-2 rounded-pill"
                                style="background-color: #1f3d85; color: aliceblue;"
                                onclick="window.location.href='{{ route('getCertificate', ['skill' => 'Musical Instruments']) }}';">
                                Get Certificate
                            </button>
                        @else
                            <button class="view-cer px-4 py-2 rounded-pill" style="background-color: grey; color:white;" disabled>
                                Not Available
                            </button>
                        @endif
                        
                        
                        {{-- <button class="view-cer  px-4 py-2 rounded-pill" type="button" style="background-color: #1f3d85; color: aliceblue;" onclick="window.location.href='getCertificate';">Get Certificate</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cer-box">
                    <div class="images/certificate-preview">
                    	<img src="images/makeup-card.jpeg" class="rounded img-fluid" width="200px" height="195px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pt-2" style="font-size: 22px;"><strong>Beauty Salon Management</strong></h5>
                        <p class="card-text">Successfully completed training in Beauty Salon Management, developing skills in salon operations and all its related fields.</p>
                        @if(in_array('Beauty salon', $skills))
                            <button class="view-cer px-4 py-2 rounded-pill"
                                style="background-color: #1f3d85; color: aliceblue;"
                                onclick="window.location.href='{{ route('getCertificate', ['skill' => 'Beauty Salon']) }}';">
                                Get Certificate
                            </button>
                        @else
                            <button class="view-cer px-4 py-2 rounded-pill" style="background-color: grey; color:white;" disabled>
                                Not Available
                            </button>
                        @endif
                        
                        
                        
                        {{-- <button class="view-cer  px-4 py-2 rounded-pill" type="button" style="background-color: #1f3d85; color: aliceblue;" onclick="window.location.href='getCertificate';">Get Certificate</button> --}}
                    </div>
            </div>
        </div>
        <div class="row  d-flex justify-content-center align-items-center min-vh-80">
            <div class="col-md-4">
                <div class="cer-box">
                        
                    
                    <div class="certificate-preview">
                    	<img src="images/language-card.jpeg" class="rounded img-fluid" width="200px" height="195px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pt-2"><strong>LANGUAGES</strong></h5>
                        <p class="card-text">Completed a course of hands-on cooking training, mastering essential techniques, recipes, and kitchen skills.</p>
                        @if(in_array('Prgramming Languages', $skills))
                            <button class="view-cer px-4 py-2 rounded-pill"
                                style="background-color: #1f3d85; color: aliceblue;"
                                onclick="window.location.href='{{ route('getCertificate', ['skill' => 'Programming Languages']) }}';">
                                Get Certificate
                            </button>
                        @else
                            <button class="view-cer px-4 py-2 rounded-pill" style="background-color: grey; color:white;" disabled>
                                Not Available
                            </button>
                        @endif
                        
                        
                        {{-- <button class="view-cer  px-4 py-2 rounded-pill" type="button" style="background-color: #1f3d85; color: aliceblue;" onclick="window.location.href='getCertificate';">Get Certificate</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cer-box">
                   
                    <div class="certificate-preview">
                    	<img src="images/graphic-card.jpeg" class="rounded img-fluid" width="200px" height="195px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pt-2"><strong>GRAPHIC DESIGNING</strong></h5>
                        <p class="card-text">Completed immersive language training, enhancing proficiency, linguistic skills, and cross-cultural communication.</p>
                        @if(in_array('Graphic Designing', $skills))
                            <button class="view-cer px-4 py-2 rounded-pill"
                                style="background-color: #1f3d85; color: aliceblue;"
                                onclick="window.location.href='{{ route('getCertificate', ['skill' => 'Graphic Designing']) }}';">
                                Get Certificate
                            </button>
                        @else
                            <button class="view-cer px-4 py-2 rounded-pill" style="background-color: grey; color:white;" disabled>
                                Not Available
                            </button>
                        @endif
                        
                        
                        {{-- <button class="view-cer  px-4 py-2 rounded-pill" type="button" style="background-color: #1f3d85; color: aliceblue;" onclick="window.location.href='getCertificate';">Get Certificate</button> --}}
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
    
@endsection