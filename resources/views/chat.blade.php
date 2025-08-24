@extends('layout.masterchat')

@section('title','chat')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">

@section('content')
<br><br><br>
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
    </div>

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
  </div>
</div>

{{-- Important: expose vars for JS --}}
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

// Page load hone par scroll neeche
document.addEventListener("DOMContentLoaded", scrollToBottom);

// Real-time message receive hone par
window.Echo.private(`chat.${window.Laravel.receiverId}`)
    .listen('MessageSent', (e) => {
        let chatBox = document.getElementById("messages");
        chatBox.innerHTML += `
            <div class="message ${e.message.sender_id === window.Laravel.userId ? 'me' : 'them'}">
                <strong>${e.user.name}:</strong> ${e.message.message}
                <small>${new Date(e.message.created_at).toLocaleTimeString()}</small>
            </div>
        `;
        scrollToBottom();
    });
</script>
@endsection
