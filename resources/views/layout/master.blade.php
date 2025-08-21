


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/all.min.css">
    <title>Brater Brains - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@yield('styles')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body >
<!-- login-popup -->
<div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="login-box">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    <div class="left-panel d-flex flex-column justify-content-center">
                        <h2>Unlock New Skills</h2>
                        <p> Login to start learning and sharing today!</p>
                    </div>
                    <div class="right-panel">
                        <h3>Hello, Again</h3>
                        <p>We are happy to have you back.</p>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control shadow-none border-dark"  placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control shadow-none border-dark" placeholder="Enter password">
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <input class="form-check-input shadow-none" type="checkbox" style="background-color: #1f3d85 ;border-color: #1f3d85;" id="rememberMe">
                                    <label for="rememberMe">Remember Me</label>
                                </div>
                                <a href="#" style="color: #1f3d85;">Forgot Password?</a>
                            </div>
                            <div class="login">
                                <button class="login-btn  rounded-pill" type="button" >Login</button> 
                            </div>
                            <div class="google">
                                <button class="google-btn  px-5 py-2 rounded-pill" type="button" >Sign in with Google</button> 
                            </div>
                            <p class="mt-3 text-center">Don't have an account?  <a href="#join_us.html" style="color: #1f3d85;">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- header -->
    <header>
    <nav class="navbar navbar-expand-lg fixed-top shadow p-3 mb-5 bg-white rounded" id="Nav">
        <div class="container">
            <a class="navbar-brand" href="welcome">
                <img src="../images/logo.png" class="img-fluid me-5 max-auto d-block" height="200" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5 me-5 ps-2" id="navbarNav">
                   <ul class="navbar-nav ms-4 me-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-6 ps-5 pe-2">
                        <a class="nav-link rounded-pill" href="services">Services</a>
                    </li>
                    <li class="nav-item  fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="trainers">Trainers</a>
                    </li>
                    
                    <li class="nav-item fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="certificates">Certificates</a>
                    </li>
                    <li class="nav-item fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="users">Users</a>
                    </li> 
                </ul>
                
                 <div class="icons position-relative">
                    <a id="searchBtn"> 
                        <i class="fa-solid fa-magnifying-glass" style="color: #1f3d85;"></i>
                        <form method="GET" action="{{ route('searchSkill') }}">
                        <div id="searchDropdown" class="search-dropdown">
                            <div class="input-group" id="input-main">
                                <span class="input-group-text bg-white border-0"><i
                                        class="fas fa-search"></i></span>
                                <input type="text" name="skills" class="form-control border-0"
                                    placeholder="Search " src="">
                                    
                            </div>
                        </div>
                        </form>
                    </a>
                    <a><i class="fa-solid fa-user" style="color: #1f3d85;" onclick="window.location.href='profile';"></i></a>
                    <a><i class="fa-solid fa-phone-volume" style="color: #1f3d85;" onclick="window.location.href='contact';"></i></a>
                    <a><i class="fa-solid fa-bell"  style="color: #1f3d85;" onclick="window.location.href='eman';"></i></a>
                 </div>
            </div>              
     </div>
    </nav>
</header>
<br><br>
<!-- page description  -->



       @yield('content')
 



<!-- footer -->
<footer class="footer mt-auto">
    <div class="container">
        <div class="row">
            <!-- Branding & Description -->
            <div class="col-md-4">
                <h5><strong>Barter Brains</strong></h5>
                <p>Connect, learn, and grow with our skill-exchange platform! Trade your expertise for new skills and collaborate with a community of learners and experts. Start sharing today!</p>
            </div>
            
            <!-- Navigation Links -->
            <div class="col-md-4 text-md-center">
                <ul class="list-unstyled">
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('trainers') }}">Trainers</a></li>
                    <li><a href="{{ route('certificates') }}">Certificates</a></li>
                    <li><a href="{{ route('joinUs') }}">Join us</a></li>
                </ul>
            </div>
            
            <!-- Social Media Links -->
            <div class="col-md-4 text-md-start">
                <h5 style="margin-left: 10px;"><strong>Learn. Teach. Grow.</strong></h5>
                <div class="social-icons">
                    <p>&nbsp;&nbsp;Here, every learner becomes a teacher and every &nbsp;&nbsp;teacher a learner. Trade your skills, earn knowledge, and &nbsp;&nbsp;discover how sharing can shape futures.</p>
                </div>
            </div>
        </div>
        
        <hr class="bg-white">
        
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url('/privacy') }}">Data Privacy</a> | <a href="{{ url('/terms') }}">Terms and Conditions</a>
            </div>
            <div class="col-md-6 text-md-end">
                <p>©2025 Barter Brains. All rights reserved</p>
            </div>
        </div>
    </div>
</footer>
@stack('scripts')
 <!-- Bootstrap JS and dependencies -->
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    // search button 
    $(document).ready(function(){
        $("#searchBtn").click(function(){
            $("#searchDropdown").toggle();
        });
        // Prevent closing when clicking inside the dropdown
        $("#searchDropdown").click(function(event){
        event.stopPropagation();
    });
        // Close when clicking outside
        $(document).click(function(event) { 
            if(!$(event.target).closest('#searchBtn').length) {
                $("#searchDropdown").hide();
            }        
        });
    });

    // login-popup
   
    document.addEventListener("DOMContentLoaded", function () {         
        });
        
    // onclick form
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        
</script>

</body>
</body>
</html>