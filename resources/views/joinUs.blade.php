@extends('layout.master')
@section('title')
    join-us
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/join-us.css')}}">
@endsection

@section('content')
    
<!-- join-us section -->

   <div class="hero">
        <div class="wave"></div>
        <h1>Join us</h1>
        <p>Join a dynamic team where every talent counts and contributes to multiple skills. At Barter Brains, we value commitment, rigor, and creativity.</p>
    </div>
    <div class="mt-5 mb-5">.</div>
    <section class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-11 ser">
                <h1 class="display-4" >Join us</h1>
                <p>We are constantly seeking talented individuals who are passionate about technical design and modeling in the field of architecture, regardless of their level of experience.</p>
                <p>Whatever your background, if you have expertise in technical drawings, 3D/BIM modeling, computer graphics, post-production, or 3D animation, we offer you the chance to be part of a dynamic team and grow in a stimulating and international environment.</p>
                <p>Join us to enhance your skills and contribute to groundbreaking projects in architecture and real estate. At Barter Brain, every talent has a place, and we welcome those with passion and ambition to be part of our journey.</p>
            </div>
        </div>
    </div>
</section>

<div>
    @if(Session::has('success'))
        <div>
            {{Session:: get('success') }}
        </div>
    @endif
</div>

<!-- login form -->
<section>
 <div class="container login_form mt-5 p-4" id="signup">
        <div class="row">
            <div class="col-md-12 col-lg-4 left-panel text-center">Spontaneous Application</div>
            <div class="col-md-12 col-lg-7 form-container">
                <form  action="store" method="POST" enctype="multipart/form-data" id="signupForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" id="name" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" placeholder="Enter first name">
                            @error('name')
                              <p class="invalid-feedback">{{ $message}}</p>    
                            @enderror
                            <div id="nameError" class="error-message text-danger"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last name</label>
                            <input type="text" id="lastname" class="form-control shadow-none @error('lastname') is-invalid @enderror" name="lastname" placeholder="Enter last name">
                            @error('lastname')
                              <p class="invalid-feedback">{{ $message}}</p>    
                            @enderror
                            <div id="lastnameError" class="error-message text-danger"></div>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">E-mail</label>
                            <input type="email" id="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" placeholder="Enter E-mail" required>
                            @error('email')
                              <p class="invalid-feedback">{{ $message}}</p>    
                            @enderror
                            <div id="emailError" class="error-message text-danger"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">+92</span>
                                <input type="tel" id="phone" class="form-control shadow-none @error('phone') is-invalid @enderror" name="phone" placeholder="Enter phone number" required>
                                @error('phone')
                                  <p class="invalid-feedback">{{ $message}}</p>    
                                @enderror
                            </div>
                            <div id="phoneError" class="error-message text-danger"></div>
                        </div>
                    </div>

                   <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" class="form-control shadow-none @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required>
                                @error('password')
                                  <p class="invalid-feedback">{{ $message}}</p>    
                                @enderror
                                <div id="passwordError" class="error-message text-danger"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" id="confirmPassword" class="form-control shadow-none" name="confirmPassword" placeholder="Confirm password" required>
                                <div id="confirmPasswordError" class="error-message text-danger"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-items col-md-6">
                            <label for="sel1" class="form-label">Skill to Share (select one):</label>
                            <select class="form-select shadow-none" id="sel1" name="sellist1" required>
                                <option selected disabled>Select Skill</option>
                                <option>Programming Languages</option>
                                <option>Graphic Designing</option>
                                <option>Cooking</option>
                                <option>Musical Instruments</option>
                                <option>Beauty Salon</option>
                            </select>
                        </div>
                        <div class="form-items col-md-6">
                            <label for="sel2" class="form-label">Skills I Want to Learn (select one):</label>
                            <select class="form-select shadow-none" id="sel2" name="sellist2" required>
                                <option selected disabled>Select Skill</option>
                                <option>Programming Languages</option>
                                <option>Graphic Designing</option>
                                <option>Cooking</option>
                                <option>Musical Instruments</option>
                                <option>Beauty Salon</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">My Achievements</label>
                            <input type="file" class="form-control shadow-none" name="pdf" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-lable">Upload Photo</label>
                            <input class="form-control" type="file" id="photo" name="profile" accept="image/*">
                        </div>                   
                        &nbsp;
                        <div class="mb-3">
                            <label class="form-label">Facilities I Provide</label>
                            <input type="text" class="form-control shadow-none" placeholder="Enter facilities" name="facilities" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">About Me</label>
                            <textarea class="form-control shadow-none" placeholder="Enter about yourself" name="about" required></textarea>
                        </div>
                        <div class="changing">
                            <button type="submit" class="btn btn-apply fw-bolder btn-end">To apply</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
const form = document.getElementById('signupForm');

form.addEventListener('submit', function(event) {
    event.preventDefault(); 

    // Clear errors
    document.getElementById('nameError').innerText = '';
    document.getElementById('lastnameError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('phoneError').innerText = '';
    document.getElementById('passwordError').innerText = '';
    document.getElementById('confirmPasswordError').innerText = '';

    // Get values
    const name = document.getElementById('name').value.trim();
    const lastname = document.getElementById('lastname').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value.trim();

    let isValid = true;

    // Name validation
    const namePattern = /^[A-Za-z]{3,20}$/;
    if (!namePattern.test(name)) {
        document.getElementById('nameError').innerText = 'Name must be 3-20 letters only, no numbers or special charaacters.';
        isValid = false;
    }

    // Lastname validation
    const lastnamePattern = /^[A-Za-z]{3,20}$/;
    if (!lastnamePattern.test(lastname)) {
        document.getElementById('lastnameError').innerText = 'Last name must be 3-20 letters only, no numbers or special characters.';
        isValid = false;
    }

    // Email validation
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/;
    if (!emailPattern.test(email)) {
        document.getElementById('emailError').innerText = 'Please enter a valid email address.';
        isValid = false;
    }

    // Phone validation (10 digits, starting with 3)
    const phonePattern = /^3\d{9}$/;
    if (!phonePattern.test(phone)) {
        document.getElementById('phoneError').innerText = 'Phone must be exactly 10 digits, starting with 3';
        isValid = false;
    }

    // Password validation
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
    if (!passwordPattern.test(password)) {
        document.getElementById('passwordError').innerText = 'Password must be at least 8 chars with uppercase, lowercase, number & special char.';
        isValid = false;
    }

    // Confirm password validation
    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
        isValid = false;
    }

    if (isValid) {
        form.submit(); // now submit form
    }
});
</script>
@endsection
