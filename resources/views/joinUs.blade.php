@extends('layout.master')
@section('title')
    join-us
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/join-us.css')}}">
@endsection

{{-- @push('scripts')
    <link rel="stylesheet" href="{{asset('js/join-us.js')}}">
@endpush --}}

@section('content')
    <div class="mt-5">.</div>
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
                

                <p>We are constantly seeking talented individuals who are passionate about technical design and modeling in the field of architecture, regardless of their level of experience.  
</p>
<p>
Whatever your background, if you have expertise in technical drawings, 3D/BIM modeling, computer graphics, post-production, or 3D animation, we offer you the chance to be part of a dynamic team and grow in a stimulating and international environment.  

</p>
                <p>
Join us to enhance your skills and contribute to groundbreaking projects in architecture and real estate. At Barter Brain, every talent has a place, and we welcome those with passion and ambition to be part of our journey.</p>
            </div>
        </div>
    </div>
    
</section>

<!-- login form -->
 <section>
 <div class="container login_form mt-5 p-4" id="signup">
        <div class="row">
            <div class="col-md-12 col-lg-4 left-panel text-center">Spontaneous Application</div>
            <div class="col-md-12 col-lg-7 form-container">
                <form id="signupForm" novalidate>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label ">Name</label>
                            <input type="text" class="form-control shadow-none" id="name" placeholder="Enter first name">
                            <div id="nameError" class="error-message"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-control shadow-none" id="lastname" placeholder="Enter last name">
                            <div id="lastnameError" class="error-message"></div>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control shadow-none" id="email" placeholder="Enter E-mail" required>
                            <div id="emailError" class="error-message"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">+92</span>
                                <input type="tel" class="form-control shadow-none" id="phone" placeholder="Enter phone number" required>
                            </div>
                            <div id="phoneError" class="error-message"></div>
                        </div>
                    </div>
                   <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control shadow-none" id="password" placeholder="Enter password" required>
                                <span class="input-group-text">
                                    <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                                <div id="passwordError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control shadow-none" id="confirmPassword" placeholder="Confirm password" required>
                                <span class="input-group-text">
                                    <i class="fas fa-eye" id="toggleConfirmPassword" style="cursor: pointer;"></i>
                                </span>
                                <div id="confirmPasswordError" class="error-message"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                         
                        <div class="form-items col-md-6 ">
                            <label for="sel1" class="form-label" >Skill to Share (select one):</label>
                            
                                <select class="form-select shadow-none  custom-select-color" name="sellist1" required>
                                  <option selected disabled>Select Skill</option>
                                  <option>Culinary arts</option>
                                  <option>Knife skills</option>
                                  <option>Chines cusine</option>
                                  <option>Italian food</option>
                                  <option>Sea food</option>
                                </select>
                        </div>
                        <div class="form-items col-md-6 ">
                            <label for="sel1" class="form-label" >Skills I Want to Learn (select one):</label>
                                <select class="form-select shadow-none " id="sel1" class=" shadow-none" name="sellist1" required>
                                  <option selected disabled>Select Skill</option>
                                  <option>Culinary arts</option>
                                  <option>Knife skills</option>
                                  <option>Chines cusine</option>
                                  <option>Italian food</option>
                                  <option>Sea food</option>
                                </select>
                        </div>
                        
                    
                    </div>
                    <div class="row mb-3">
                           <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">My Acheivments</label>
                                <input type="file" class="form-control shadow-none" required>
                            </div>
                        </div>
                      
                        &nbsp;
                        <div class="mb-3">
                            <label class="form-label">Facilities I Provide</label>
                            <input type="text" class="form-control shadow-none" placeholder="Enter portfolio" required>
                        </div>
                            <div class="mb-3">
                            <label class="form-label">About Me</label>
                            <textarea class="form-control shadow-none"  placeholder="Enter about yourself" required></textarea>
                        </div>
                    <div class="changing">
                    <button type="submit" class="btn btn-apply fw-bolder btn-end" >To apply</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>


    //show password 
    function toggleVisibility(inputId, iconElement) {
    const input = document.getElementById(inputId);

    if (input.type === 'password') {
        input.type = 'text';
        iconElement.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        iconElement.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

document.getElementById('togglePassword').addEventListener('click', function () {
    toggleVisibility('password', this);
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    toggleVisibility('confirmPassword', this);
});

//form validation
const form = document.getElementById('signupForm');

    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Stop the form from submitting

      // Clear all previous errors
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
      const namePattern = /^[A-Za-z]+$/; // Only letters, no spaces, no numbers
  if (!namePattern.test(name)) {
    document.getElementById('nameError').innerText = 'Name must contain only letters without spaces or numbers.';
    isValid = false;
  } else if (name.length < 3) {
    document.getElementById('nameError').innerText = 'Name must be at least 3 characters long.';
    isValid = false;
  }

  // lastName validation
  const lastnamePattern = /^[A-Za-z]+$/; // Only letters, no spaces, no numbers
  if (!lastnamePattern.test(name)) {
    document.getElementById('lastnameError').innerText = 'Name must contain only letters without spaces or numbers.';
    isValid = false;
  } else if (lastname.length < 3) {
    document.getElementById('lastnameError').innerText = 'Name must be at least 3 characters long.';
    isValid = false;
  }

      // Email validation
      const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/;
      if (!emailPattern.test(email)) {
        document.getElementById('emailError').innerText = 'Please enter a valid email address.';
        isValid = false;
      }

      //phone validation
      const phonePattern = /^3\d{9}$/;
  if (!phonePattern.test(phone)) {
    document.getElementById('phoneError').innerText = 'Please enter a valid 10-digit Pakistani phone number starting with 3.';
    isValid = false;
  }

      // Password validation
      const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (!passwordPattern.test(password)) {
        document.getElementById('passwordError').innerText = 
          'Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.';
        isValid = false;
      }

      // Confirm password validation
      if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
        isValid = false;
      }

      // If valid, you can proceed (show success message, redirect, etc.)
      if (isValid) {
        alert('Sign up successful!');
      }
    }); 
</script>

@endsection