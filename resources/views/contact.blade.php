@extends('layout.master')

@section('title')
    contact
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection

@section('content')
    <div class="mt-5">.</div>
<!-- contact-us section -->

   <div class="hero">
        <div class="wave"></div>
        <h1>Contact us</h1>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem cupiditate cum consequuntur quia eos dolor quae quasi! Ab, consequatur? Assumenda dolorum saepe accusantium qui? Quisquam assumenda quaerat voluptate qui dolores.</p>
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
                    <form id="contactForm" novalidate>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control shadow-none" id="name" placeholder="Enter first name" required>
                                 <div id="nameError" class="error-message"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control shadow-none" id="lastname" placeholder="Enter last name" required>
                                 <div id="lastnameError" class="error-message"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control shadow-none" id="email" placeholder="Enter e-mail" required>
                                 <div id="emailError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message or Reviwe</label>
                            <textarea class="form-control shadow-none" id="message" placeholder="Enter your message" rows="4" required></textarea>
                        </div>
                        
                        <div class="changing">
                    <button type="submit" class="btn btn-apply fw-bolder btn-end">Send Request</button>
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

    <script>
        
    //form validation
const form = document.getElementById('contactForm');

    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Stop the form from submitting

      // Clear all previous errors
      document.getElementById('nameError').innerText = '';
      document.getElementById('lastnameError').innerText = '';
      document.getElementById('emailError').innerText = '';
      
      // Get values
      const name = document.getElementById('name').value.trim();
      const lastname = document.getElementById('lastname').value.trim();
      const email = document.getElementById('email').value.trim();
     

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

    });

    </script>
@endsection