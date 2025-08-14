@extends('layout.masterp')

@section('title')
    chat
@endsection
<link rel="stylesheet" href="{{asset('css/chat.css')}}">

@section('content')
    
<br><br><br>
<div class="chat-wrapper">
    <!-- Friends List -->
    {{-- <div class="friends-list">
        <h5 class="mb-3">Friends</h5>
        @foreach($friends as $friend)
            <a href="{{ route('chat.with', $friend->id) }}">
                {{ $friend->name }}
            </a>
        @endforeach
    </div> --}}

    <!-- Chat Box -->
    <div class="chat-container">
        <div class="chat-header">
            Chat with {{ $receiver->name }}
        </div>

        <div class="messages-box" id="messages">
            @foreach($messages as $m)
                <div class="message {{ $m->sender_id === auth()->id() ? 'me' : 'them' }}">
                    <strong>{{ $m->sender->name }}:</strong>
                    
                    @if($m->image)
                        <img src="{{ asset('storage/chat_images/'.$m->image) }}" alt="Image" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('{{ asset('storage/chat_images/'.$m->image) }}')">
                    @else
                        {{ $m->message }}
                    @endif

                    <small>{{ $m->created_at->format('H:i') }}</small>
                </div>
            @endforeach
        </div>

        <!-- Chat Input -->
        <div class="chat-input">
            <form id="chatForm" class="d-flex w-100 align-items-center" enctype="multipart/form-data">
                @csrf
                <input type="text" id="message" class="form-control me-2" placeholder="Type a message..." autocomplete="off">

                <!-- Hidden File Input -->
                <input type="file" name="image" id="fileInput" accept="image/*">

                <!-- Image Icon -->
                <i class="bi bi-image icon-btn me-2" onclick="document.getElementById('fileInput').click()"></i>

                <!-- Send Button -->
                <button type="submit" class="button">Send</button>
            </form>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <img id="modalImage" class="img-fluid rounded">
        </div>
    </div>
</div>

<script>
    function showImage(src) {
        document.getElementById('modalImage').src = src;
    }

    window.Laravel = {
        userId: {{ auth()->id() }},
        receiverId: {{ $receiver->id }},
        sendMessageUrl: "{{ route('send.message') }}"
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection



