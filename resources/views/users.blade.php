@extends('layout.masterp')

@section('title')
    Users
@endsection

<link rel="stylesheet" href="{{ asset('css/users.css') }}">

@section('content')

<div class="container mt-5">
    <h2 class="page-title text-center mb-4" style="color: #1f3d85; font-weight: bold; font-size:40px;">
        Connect with Other Learners
    </h2>

    @foreach ($users as $user)
        <div class="card shadow-sm p-3 mb-3">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <img src="{{ asset('uploads/' . $user->profile) }}" 
                         alt="Profile Image" 
                         class="rounded-circle" 
                         width="80" height="80">
                </div>

                <div class="flex-grow-1">
                    <h5 style="color:#1f3d85; font-weight:bold;">
                        {{ $user->name }} {{ $user->lastname }}
                    </h5>
                    <p class="mb-1"><strong>Teach:</strong> {{ $user->sellist1 ?? 'Not Selected' }}</p>
                    <p class="mb-1"><strong>Learn:</strong> {{ $user->sellist2 ?? 'Not Selected' }}</p>
                    <p class="mb-1">
                        <strong>Achievements:</strong>
                        @if(!empty($user->pdf) && file_exists(public_path('pdfs/' . $user->pdf)))
                            <a href="{{ asset('pdfs/' . $user->pdf) }}" target="_blank">{{ $user->pdf }}</a>
                        @else
                            <span class="text-muted">No file</span>
                        @endif
                    </p>
                </div>

                {{-- Friend Request Button --}}
                <div>
                    @auth
                        @php
                            $requested = App\Models\FriendRequest::where('sender_id', auth()->id())
                                          ->where('receiver_id', $user->id)
                                          ->where('status', 'pending')
                                          ->exists();

                            $friends = App\Models\Friend::where('user_id', auth()->id())
                                          ->where('friend_id', $user->id)
                                          ->exists();
                        @endphp

                        @if ($friends)
                            <button class="btn btn-secondary" disabled>Friends now!</button>
                        @elseif ($requested)
                            <button class="btn btn-primary" disabled>Request Sent</button>
                        @else
                            <button class="btn send-request-btn" style="background-color: #0f2862; color: white;"
                                    data-user-id="{{ $user->id }}">
                                Send Request
                            </button>
                        @endif
                    @endauth

                    @guest
                        
                        <a href="{{ route('login') }}" class="btn btn-secondary">
                            Send Request
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- JS for requests --}}
@auth
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sendButtons = document.querySelectorAll('.send-request-btn');

    sendButtons.forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.dataset.userId;
            const buttonEl = this;

            fetch(`/send-request/${userId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                buttonEl.textContent = "Request Sent";
                buttonEl.disabled = true;
                buttonEl.classList.remove("btn-primary");
                buttonEl.classList.add("btn-secondary");
                if (data.message) alert(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong.');
            });
        });
    });
});
</script>
@endauth

@endsection
