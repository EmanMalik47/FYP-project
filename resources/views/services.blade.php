@extends('layout.master')
@section('title')
    services
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('css/services.css')}}">
@endsection

@section('content')
<div class="hero-section">
        <div class="overlay"></div>
        <div class="content">
           <h1>Our Service</h1>
        <p>Our dedicated team of experts and community-driven<br>moderators ensure a seamless skill exchange experience.</p>
        <p> Their knowledge and guidance enhance user<br>interactions and creating valuable learning opportunities.</p>
    </div>

        </div>
    
<br><br>
<section class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-11 ser">
                <h1 class="display-4" >Services</h1>
                <h2>Connect with experts, exchange skills, and enhance your abilities through our collaborative learning platform!</h2>

                <p>At Barter Brains, we position overselves as a leading hub for connecting individuals based on their skills and learning itersets.However, we are more then just a matching plateform, we are a community-driven technology company, investing in both our users and our digital infrastructure.</p>
                <p>Using Barter Brains means maximum personal growth, fostering meaningful connections, and ensuring a flexible and efficient learning experience. Our commitment to innovation and user engagement allows us to continously enhance the way people share and acquire skills.</p>
            </div>
        </div>
    </div>
    
</section>
<br>
<hr class="custom-hr">
<br><br>
<section>
    <div class="scrolling-container">
        <div class="scrolling-text d-flex">
            <span class="d-flex"><img src="../images/circle.png" class="img-fluid me-5 max-auto d-block"  width="60px">
            Cooking</span>
            <span class="d-flex"><img src="../images/circle.png" class="img-fluid me-5 max-auto d-block"  width="60px">
            Beauty Salon Management</span>
            <span class="d-flex"><img src="../images/circle.png" class="img-fluid me-5 max-auto d-block"  width="60px">
            Musical Instruments</span>
            <span class="d-flex"><img src="../images/circle.png" class="img-fluid me-5 max-auto d-block"  width="60px">
            Programming Languages</span>
            <span class="d-flex"><img src="../images/circle.png" class="img-fluid me-5 max-auto d-block"  width="60px">
            Graphic Designing</span>
            

        </div>
    </div>
</section>
<br><br>
<hr class="custom-hr">
<br><br>
<!-- Our Sub-Skills -->
<div class="container-fluid Sub-skills mt-2">
   
    <div class="container sub-skill">
        <div class="col-md-12 pt-4 skill-heading">
            <h1>Our Sub-Skills</h1>
            <h3>We offer our expertise across various sub-skills, including mehndi art, Culinary arts,Rhythm & beat-making,International cuisine, and 3D modeling & rendering, to help users connect and exchange knowledge effectively. </h3>
        </div>
         <!--  3D modeling & rendering -->
    <div class="row align-items-center content-section block">
        <div class="col-md-6 image-container">
            <img src="../images/3d-modling.jfif" alt="3d-modling">
        </div>
        <div class="col-md-6">
            <h2>3D modeling & rendering</h2>
            <p>3D modeling and rendering bring ideas to life by creating realistic digital designs for games, animation, and architecture. It is used in games, movies, architecture, and product design.
            Artists create 3D objects, add textures, and bring them to life with lighting.Learning this skill enhances creativity and attention to detail.  </p>
        </div>
    </div>

    <!-- Mehndi art -->
    <div class="row align-items-center content-section flex-md-row-reverse block">
        <div class="col-md-6 image-container ml-auto">
            <img src="../images/mehndi.jfif" alt="mehndi Design">
        </div>
        <div class="col-md-6">
            <h2>Mehndi art</h2>
            <p> Mehndi art is a beautiful form of expression, creating intricate designs for celebrations and traditions. From bridal henna to modern patterns, this skill blends creativity and cultural heritage. Learning mehndi enhances artistic precision and design expertise  </p>
        </div>
    </div>
    <!-- Culinary arts -->
    <div class="row align-items-center content-section block">
        <div class="col-md-6 image-container">
            <img src="../images/Culinary-arts.jfif" alt="Culinary-arts">
        </div>
        <div class="col-md-6">
            <h2>Culinary arts</h2>
            <p>Culinary arts is the skill of preparing and presenting delicious food.  
                It involves cooking techniques, flavors, and creativity in the kitchen.  
                Chefs experiment with ingredients to create amazing dishes.  
                Baking, grilling, and plating are all part of this skill.  
                It enhances creativity, precision, and a love for food.  
                Learning culinary arts can lead to a fun and rewarding career!  </p>
        </div>
    </div>
     <!-- International cuisine -->
    <div class="row align-items-center content-section flex-md-row-reverse block">
        <div class="col-md-6 image-container">
            <img src="../images/International-cuisine.jpg" alt="International-cuisine ">
        </div>
        <div class="col-md-6">
            <h2>International cuisine </h2>
            <p>International cuisine is the art of cooking dishes from around the world.
                It explores unique flavors, ingredients, and cooking techniques.
                From Italian pasta to Japanese sushi, every culture has its specialties.
                Learning this skill helps create diverse and delicious meals.
                It enhances creativity and understanding of global food traditions.  </p>
        </div>
    </div>
    <!-- Rhythm and beat-making -->
    <div class="row align-items-center content-section block">
        <div class="col-md-6 image-container">
            <img src="../images/beat-making.jpg" alt="beat-making">
        </div>
        <div class="col-md-6">
            <h2>Rhythm and beat-making</h2>
            <p>Rhythm and beat-making is the art of creating music’s groove and flow.
                It involves drum patterns, melodies, and sound mixing.
                Producers use digital tools to craft unique beats for songs.
                This skill enhances creativity and a sense of timing.
                Learning beat-making opens doors to music production and creativity</p>
        </div>
    </div>
     
</div>
</div><br><br>
<hr class="custom-hr">
<br><br>

<div class="container mt-4">
    <div class="advan text-center mb-4">
        <h1>Advantages</h1>
    </div>
    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="Opportunities-tab" data-bs-toggle="tab" data-bs-target="#Opportunities" type="button" role="tab">1. Networking Opportunities</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Cost-Effective-tab" data-bs-toggle="tab" data-bs-target="#Cost-Effective" type="button" role="tab">2. Cost-Effective Learning
</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Exchanges-tab" data-bs-toggle="tab" data-bs-target="#Exchanges" type="button" role="tab">3. Flexible Exchanges
</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Development-tab" data-bs-toggle="tab" data-bs-target="#Development" type="button" role="tab">4. Skill Development
</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Trust-tab" data-bs-toggle="tab" data-bs-target="#Trust" type="button" role="tab">5. Trust & Credibility






</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="Opportunities" role="tabpanel">
            <div class="card active-card">
                <h5 class="card-title">01. Networking Opportunities</h5>
                <p class="card-text">Connect with a diverse community of skilled individuals, fostering collaborations across various fields and expertise.  </p>
            </div>
        </div>
        <div class="tab-pane fade" id="Cost-Effective" role="tabpanel">
            <div class="card active-card">
                <h5 class="card-title">02. Cost-Effective Learning</h5>
                <p class="card-text">Gain new skills without financial investment by exchanging expertise with others in a mutually beneficial system.</p>
            </div>
        </div>
        <div class="tab-pane fade" id="Exchanges" role="tabpanel">
            <div class="card active-card">
                <h5 class="card-title">03. Flexible Exchanges</h5>
                <p class="card-text">Users can set their own terms, schedules, and preferences, ensuring a personalized and efficient learning experience.  </p>
            </div>
        </div>
        <div class="tab-pane fade" id="Development" role="tabpanel">
            <div class="card active-card">
                <h5 class="card-title">04. Skill Development</h5>
                <p class="card-text"> Continuous access to new learning opportunities enables users to enhance their personal and professional growth. </p>
            </div>
        </div>
        <div class="tab-pane fade" id="Trust" role="tabpanel">
            <div class="card active-card">
                <h5 class="card-title">05. Trust & Credibility</h5>
                <p class="card-text">A structured platform with verified profiles, ratings, and agreements ensures reliability, security, and transparency in exchanges.
                concise the topics names of these advantages but not the description .</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>

    @endsection