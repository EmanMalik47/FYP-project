@extends('layout.masterp')
@section('title')
GetCertificate
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/getCertificate.css')}}">
    {{-- <style>
        .alert-top {
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            width: 60%;
        }
        button[disabled] {
            cursor: not-allowed;
            opacity: 0.6;
        }
    </style> --}}
@endsection

@section('content')
<br><br><br><br><br>

@if(session('error'))
    <div class="alert alert-danger text-center alert-top">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success text-center alert-top">
        {{ session('success') }}
    </div>
@endif

<div class="certificate mt-5 p-4 border border-secondary m-auto shadow">
    <div class="overlay"></div>
    <div class="cer-body">
        <form class="form" id="certificateForm" method="POST" action="{{ route('certificate.generate') }}">
            @csrf

            <div class="form-items d-flex">
                <label for="date" class="form-label">
                    <strong>Date:</strong> {{ $data['date'] ?? '' }}
                </label>
                <input type="hidden" id="date" name="date" value="{{ $data['date'] ?? '' }}">
            </div>

            <div class="form-items ">
                <h5 style="font-size: 25px;">This is certified that</h5>
                <div class="d-flex">
                    <label for="name" class="form-label">
                        <strong>Name:</strong> {{ $data['name'] ?? '' }}
                    </label>
                    <input type="hidden" id="name" name="name" value="{{ $data['name'] ?? '' }}">
                </div>
            </div>

            <div class="form-items d-flex">
                <label for="lastname" class="form-label">
                    <strong>Last Name:</strong> {{ $data['lastname'] ?? '' }}
                </label>
                <input type="hidden" name="lastname" value="{{ $data['lastname'] ?? '' }}">
            </div>

            <div class="form-items d-flex">
                <label class="form-label">
                    Attained proficiency in the 
                    <strong>{{ $data['skill'] ?? '' }}</strong> 
                    course held in Barter Brains.
                </label>
                <input type="hidden" name="skill" value="{{ $data['skill'] ?? '' }}">    
            </div>

            <div class="form-items ">
                <div class="d-flex">
                    <label class="form-label"><strong>From:</strong> {{ $data['from'] ?? '' }}</label>
                    <input type="hidden" id="from" name="from" value="{{ $data['from'] ?? '' }}">
                    <label class="form-label">&nbsp;&nbsp;<strong>to:</strong> {{ $data['to'] ?? '' }}</label>
                    <input type="hidden" id="to" name="to" value="{{ $data['to'] ?? '' }}">
                </div>
                <div class="stamp-container">
        <img src="{{ asset('images/stemp.png') }}" alt="Stamp" class="stamp-img">
    </div>
            </div>
        </form>
    </div>
</div>

<br><br>

<div class="custom" style="margin-top: 20px;">
        <button onclick="submitCertificateForm()" type="button" class="custom-btn px-5 py-2 rounded-pill">
            Download Certificate
        </button>
    
</div>
<br><br><br>


<div class="modal fade" id="congratsModal" tabindex="-1" aria-labelledby="congratsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4 text-center">
      <h4 class="text-success"> Congratulations! </h4>
      <p>Your certificate has been successfully generated and downloaded.</p>
      <button type="button" class="btn" style="background-color: #0f2862; color: white;" data-bs-dismiss="modal">OK</button>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function submitCertificateForm() {
    document.getElementById('certificateForm').submit();
}
</script>

@if(session('success'))
<script>
    var myModal = new bootstrap.Modal(document.getElementById('congratsModal'));
    myModal.show();
</script>
@endif

@endsection
