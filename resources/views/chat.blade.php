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


    <div class="messages-box" id="messages">
      @foreach($messages as $m)
        <div class="message {{ $m->sender_id === auth()->id() ? 'me' : 'them' }}">
          <strong>{{ $m->sender->name }}:</strong>
          {{ $m->message }}
          <small>{{ $m->created_at->format('H:i') }}</small>
        </div>
      @endforeach
    </div>

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

{{-- Important: expose vars for app.js --}}
<script>
  window.Laravel = {
    userId: {{ auth()->id() }},
    receiverId: {{ $receiver->id }},
    sendMessageUrl: "{{ route('send.message') }}"
  };
</script>
@endsection
