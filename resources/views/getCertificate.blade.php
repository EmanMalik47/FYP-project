@extends('layout.masterp')
@section('title')
GetCertificate
    
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/getCertificate.css')}}">
@endsection
@section('content')
<br><br><br><br><br>
    <div class="certificate mt-5 p-4 border border-secondary m-auto">
 	<div class="overlay"></div>
 	<div class="cer-body">
 		<form class="form">
            <div class="form-items d-flex">
                <label for="date" class="form-label">Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="date" class="form-control" id="date" required>
            </div>
            <!-- <h5>This is certified that</h5> -->
            
            <div class="form-items ">
            	<h5 style="font-size: 25px;">This is certified that</h5>
            	<!-- <label for="name" class="form-label">This is certified that</label> -->
            	<div class="d-flex">
	            <label for="name" class="form-label">Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
	            <input type="text" class="form-control" id="name" required>
	            </div>
            </div>
           
            
            <div class="form-items d-flex">
                <label for="so" class="form-label">S/O,D/O:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" id="so" required>
            </div>
            <div class="form-items d-flex">
                <label for="sel1" class="form-label" >Learned Skill (select one):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				    <select class="form-select " id="sel1" name="sellist1">
				      <option selected disabled>Select Skill</option>
				      <option>Programming Languages</option>
				      <option>Graphic Designing</option>
				      <option>Cooking</option>
				      <option>Beauty Salon</option>
				      <option>Musical Instruments</option>
				    </select>
            </div>
            <div class="form-items ">
                <h5 style="font-size: 25px;">Attained proficiency in the mentioned course held in Barter Brains</h5>
                <!-- <label for="name" class="form-label">This is certified that</label> -->
                <div class="d-flex">
                <label for="date" class="form-label">From:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="date" class="form-control" id="date" required>
                <label for="date" class="form-label">&nbsp;&nbsp;&nbsp;to:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="date" class="form-control" id="date" required>
                </div>
            </div>
            <!-- <button type="button" class="btn btn-primary" onclick="generateCertificate()">Generate Certificate</button> -->
 		</form>
 	</div>
 </div>
 
 <br><br><br>

 <!-- javascript -->

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <script>
        function generateCertificate() {
            document.getElementById("certDate").textContent = document.getElementById("date").value;
            document.getElementById("certName").textContent = document.getElementById("name").value;
            document.getElementById("certSo").textContent = document.getElementById("so").value;
            document.getElementById("certSkill").textContent = document.getElementById("skill").value;
            // document.getElementById("certFrom").textContent = document.getElementById("from").value;
        }
    </script>
@endsection
 