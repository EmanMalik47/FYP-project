@extends('layout.master')

@section('title')
    contact 
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection

@section('content')
    <div class="mt-5">.</div>


   <div class="hero">
        <div class="wave"></div>
        <h1>Contact us</h1>
        <p>Get in touch with us! Whether you have questions, feedback, or need support, the Barter Brains team is here to help.</p>
    </div>
    <div class="mt-5 mb-5">.</div>
    <section class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-11 ser">
                <h1 class="display-4" >Contact us</h1>
                <p>Connect with us through our contact form, email, or social media. We value your input and are committed to making skill exchange seamless and rewarding for everyone.</p>
                <p>Whether you need assistance, want to share feedback, or explore collaboration opportunities, we’d love to hear from you. Reach out via our contact form, email, or social media, and let’s work together to build a thriving skill-exchange community. Your journey starts here!  
                </p>
            </div>
        </div>
    </div>
    
</section>

<!-- form -->


 <div class="container login_form mt-5 p-4" id="contact">
        <div class="row">
            <div class="col-md-4 left-panel text-center"><h1><strong>Contact Us</strong></h1>
                <p style="font-size: 13px; color:black;">Ready to take the next step?<br> Let’s bring your vision to life: <br>contact us and let’s get started!</p>
            </div>
            <div class="col-md-7 form-container">
                @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
                    <form  novalidate action="{{route('contact')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control shadow-none value="{{ old('firstname') }} name="firstname" id="firstname" placeholder="Enter first name" required>
                                 @error('firsttname') <div class="invalid-feedback">{{ $message }}</div> @enderror 
                                <div id="nameError" class="error-message"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control shadow-none value="{{ old('firstname') }}  name="lastname" id="lastname" placeholder="Enter last name" required>
                                 @error('lastname') <div class="invalid-feedback">{{ $message }}</div> @enderror 
                                <div id="lastnameError" class="error-message"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control shadow-none" value="{{ old('firstname') }}"  name="email" id="email" placeholder="Enter e-mail" required>
                                 <div id="emailError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message or Reviwe</label>
                           <textarea class="form-control shadow-none  @error('message') is-invalid @enderror"  name="message" id="message" placeholder="Enter your message" rows="4" required></textarea>
                        </div>
                        
                        <div class="changing">
                    <button type="submit" id="submitBtn" class="btn btn-apply fw-bolder btn-end">Send Message</button>
                </div>
                    </form>
             </div>
        </div>
    </div>
    <br>
    <br>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
    //form validation
const form = document.getElementById('contact');

    form.addEventListener('submit', function(event) )
      event.preventDefault(); 

      
      document.getElementById('firstnameError').innerText = '';
      document.getElementById('lastnameError').innerText = '';
      document.getElementById('emailError').innerText = '';
       document.getElementById('messageError').innerText = '';
      
      // Get values
      const name = document.getElementById('firstname').value.trim();
      const lastname = document.getElementById('lastname').value.trim();
      const email = document.getElementById('email').value.trim();
      const message = document.getElementById('message').value.trim();
     

      let isValid = true;

      // Name validation
      const namePattern = /^[A-Za-z]+$/; 
  if (!namePattern.test(firstname)) {
    document.getElementById('firstnameError').innerText = 'Name must contain only letters without spaces or numbers.';
    isValid = false;
  } else if (firstname.length < 3) {
    document.getElementById('firstnameError').innerText = 'Name must be at least 3 characters long.';
    isValid = false;
  }

  // lastName validation
  const lastnamePattern = /^[A-Za-z]+$/; 
  if (!lastnamePattern.test(lastname)) {
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
  if (isValid) {
        form.submit();
    }

    </script>
@endsection