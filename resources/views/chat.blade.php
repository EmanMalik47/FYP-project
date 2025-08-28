@extends('layout.masterchat')

@section('title','chat')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
 
@section('content')
<br><br><br>
@if(session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger text-center">
    {{ session('error') }}
  </div>
@endif

<div class="chat-wrapper">
  <div class="friends-list">
    <h5 class="mb-3">Friends</h5>
    @foreach($friends as $friend)
      <a href="{{ route('chat', $friend->id) }}">{{ $friend->name }}</a>
    @endforeach
  </div>

  <div class="chat-container">
    <div class="chat-header d-flex justify-content-between align-items-center">
      <span>Chat with {{ $receiver->name }}</span>
      <a href="{{ url('/profile') }}" class="close-btn">&times;</a>
      <div class="mt-2">
  <form action="{{ route('chat.complete', $receiver->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-sm">
      Mark as Completed
    </button>
  </form>
</div>

    </div>
 @if($blocked)
    <div class="alert alert-danger text-center my-4">
      This user is blocked by admin.
    </div>
  @else
    {{-- Messages box --}}
    <div class="messages-box" id="messages" style="height:400px; overflow-y:auto;">
      @foreach($messages as $m)
        <div class="message {{ $m->sender_id === auth()->id() ? 'me' : 'them' }}">
          <strong>{{ $m->sender->name }}:</strong>
          {{ $m->message }}
          <small>{{ $m->created_at->format('H:i') }}</small>
        </div>
      @endforeach
    </div>

    {{-- Input box --}}
    <div class="chat-input">
      <form id="chatForm" class="d-flex w-100 align-items-center" method="POST" action="{{ route('send.message') }}">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <input type="text" name="message" id="message" class="form-control me-2 shadow-none" placeholder="Type a message..." autocomplete="off" required>
        <button type="submit" class="button">Send</button>
      </form>
    </div>
  @endif
</div>
    {{-- Messages box --}}
    {{-- <div class="messages-box" id="messages" style="height:400px; overflow-y:auto;">
      @foreach($messages as $m)
        <div class="message {{ $m->sender_id === auth()->id() ? 'me' : 'them' }}">
          <strong>{{ $m->sender->name }}:</strong>
          {{ $m->message }}
          <small>{{ $m->created_at->format('H:i') }}</small>
        </div>
      @endforeach
    </div> --}}

    {{-- Input box --}}
    {{-- <div class="chat-input">
      <form id="chatForm" class="d-flex w-100 align-items-center" method="POST" action="{{ route('send.message') }}">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <input type="text" name="message" id="message" class="form-control me-2 shadow-none" placeholder="Type a message..." autocomplete="off" required>
        <button type="submit" class="button">Send</button>
      </form>
    </div>
  </div>
</div> --}}


<script>
  window.Laravel = {
    userId: {{ auth()->id() }},
    receiverId: {{ $receiver->id }},
    sendMessageUrl: "{{ route('send.message') }}"
  };
</script>

{{-- Scroll handling --}}
<script>
function scrollToBottom() {
    let chatBox = document.getElementById("messages");
    if(chatBox){
        chatBox.scrollTop = chatBox.scrollHeight;
    }
}


document.addEventListener("DOMContentLoaded", scrollToBottom);

window.Echo.private(`chat.${window.Laravel.userId}`)
    .listen('.MessageSent', (e) => {
        let chatBox = document.getElementById("messages");

       
        if (e.message.receiver_id === window.Laravel.userId) {

            
            if (e.message.sender_id === window.Laravel.receiverId) {
                chatBox.innerHTML += `
                    <div class="message them">
                        <strong>${e.message.sender.name}:</strong> ${e.message.message}
                        <small>${new Date(e.message.created_at).toLocaleTimeString()}</small>
                    </div>`;
                scrollToBottom();
            }

            // Friends list unread badge update
            let badge = document.getElementById(`friend-unread-${e.message.sender_id}`);
            if (badge) {
                badge.innerText = parseInt(badge.innerText) + 1;
            } else {
                let friendItem = document.querySelector(`#friendsMenu a[href*="chat/${e.message.sender_id}"]`);
                if (friendItem) {
                    friendItem.innerHTML += `<span class="badge bg-danger ms-2" id="friend-unread-${e.message.sender_id}">1</span>`;
                }
            }

            // Top icon total unread badge update
            let totalBadge = document.querySelector('#friendsDropdown .badge');
            if (totalBadge) {
                totalBadge.innerText = parseInt(totalBadge.innerText) + 1;
            } else {
                document.querySelector('#friendsDropdown').innerHTML += `
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">1</span>`;
            }
        }
    });

</script>
@endsection
