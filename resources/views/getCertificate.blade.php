@extends('layout.masterp')
@section('title')
GetCertificate
    
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/getCertificate.css')}}">
@endsection
@section('content')
<br><br><br><br><br>

    <div class="certificate mt-5 p-4 border border-secondary m-auto shadow">
 	<div class="overlay"></div>
 	<div class="cer-body">
 		<form class="form" id="certificateForm" method="POST" action="{{ route('certificate.generate') }}">
            @csrf
           
            <div class="form-items d-flex">
                <label for="date" class="form-label"><strong>Date:</strong>{{ isset($data['date']) ? $data['date'] : '' }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="hidden" class="form-control" id="date" name="date" required  value="{{ $data['date'] ?? '' }}">
            </div>
          
            
            <div class="form-items ">
            	<h5 style="font-size: 25px;">This is certified that</h5>
            	
            	<div class="d-flex">
	            <label for="name" class="form-label"><strong>Name:</strong>{{ isset($data['name']) ? $data['name'] : '' }}&nbsp;&nbsp;&nbsp;&nbsp;</label>
	            <input type="hidden" class="form-control" id="name" name="name" required value="{{ $data['name'] ?? '' }}">
	            </div>
            </div>
           
            
            <div class="form-items d-flex">
                <label for="lastname" class="form-label"><strong>S/O,D/O:</strong>{{ isset($data['lastname']) ? $data['lastname'] : '' }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="hidden" name="lastname" value="{{ $data['lastname'] ?? '' }}">
                </div>
            <div class="form-items d-flex">
                <label for="sel1" class="form-label" >Attained proficiency in the <strong>{{ isset($data['skill']) ? $data['skill'] : '' }}</strong> course held <br>in Barter Brains.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				 <input type="hidden" name="skill" value="{{ $data['skill'] ?? '' }}">    
               
            </div>
            <div class="form-items ">
                {{-- <h5 style="font-size: 25px;">Attained proficiency in the mentioned course held in Barter Brains</h5> --}}
              
                <div class="d-flex">
                <label for="date" class="form-label"><strong>From:</strong>{{ isset($data['from']) ? $data['from'] : '' }}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="date" class="form-control" id="from" name="from" required>
                <label for="date" class="form-label">&nbsp;&nbsp;&nbsp;<strong>to:</strong>{{ isset($data['to']) ? $data['to'] : '' }}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="date" class="form-control" id="to" name="to" required>
                </div>
            </div>
            <!-- <button type="button" class="btn btn-primary" onclick="generateCertificate()">Generate Certificate</button> -->
 		
 	</div>
 </div>
 <br><br>
 </form>
        <div class="custom" style="margin-top: 20px;">
    <button onclick="submitCertificateForm()" type="button" class="custom-btn px-5 py-2 rounded-pill">Download Certificate</button>
</div>
 <br><br><br>

 <!-- javascript -->

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <script>
        function generateCertificate() {
            // document.getElementById("certDate").textContent = document.getElementById("date").value;
            // document.getElementById("certName").textContent = document.getElementById("name").value;
            // document.getElementById("certSo").textContent = document.getElementById("so").value;
            // document.getElementById("certSkill").textContent = document.getElementById("skill").value;
            document.getElementById("certDate").textContent = document.getElementById("from").value;
            document.getElementById("certDate").textContent = document.getElementById("to").value;
            
        }
        
    function submitCertificateForm() {
        document.getElementById('certificateForm').submit();
    }

    </script>
@endsection