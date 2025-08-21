@extends('layout.masterp')

@section('title')
    chat
@endsection
<link rel="stylesheet" href="{{asset('css/chat.css')}}">

@section('content')
    
<br><br><br>
<div class="chat-wrapper">
    <!-- Friends List -->
    <div class="friends-list">
        <h5 class="mb-3">Friends</h5>
        @foreach($friends as $friend)
            <a href="{{ route('chat', $friend->id) }}">
                {{ $friend->name }}
            </a>
        @endforeach
    </div>

    <!-- Chat Box -->
    <div class="chat-container">
        <div class="chat-header">
            Chat with {{ $receiver->name }}
        </div>

        <div class="messages-box" id="messages">
            @foreach($messages as $m)
                <div class="message {{ $m->sender_id === auth()->id() ? 'me' : 'them' }}">
                    <strong>{{ $m->sender->name }}:</strong>
                    
                    {{-- @if($m->image)
                        <img src="{{ asset($m->image) }}" alt="Image" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('{{ asset('storage/chat_images/'.$m->image) }}')"> --}}
                    
                        {{ $m->message }}
                    

                    <small>{{ $m->created_at->format('H:i') }}</small>
                </div>
            @endforeach
        </div>

        <!-- Chat Input -->
        <div class="chat-input">
            <form id="chatForm" class="d-flex w-100 align-items-center" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                
                <input type="text" name="message" id="message" class="form-control me-2 shadow-none" placeholder="Type a message..." autocomplete="off" required>
                <!-- Hidden File Input -->
                {{-- <input type="file" name="image" id="fileInput" accept="image/*"> --}}

                <!-- Image Icon -->
                {{-- <i class="bi bi-image icon-btn me-2" onclick="document.getElementById('fileInput').click()"></i> --}}

                <!-- Send Button -->
                <button type="submit" class="button">Send</button>
            </form>
        </div>
    </div>
</div>

<!-- Image Modal -->
{{-- <div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <img id="modalImage" class="img-fluid rounded">
        </div>
    </div>
</div> --}}

<script>
    // function showImage(src) {
    //     document.getElementById('modalImage').src = src;
    // }

    // CSRF token
axios.defaults.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}';

// AJAX submit
// document.getElementById('chatForm').addEventListener('submit', function(e) {
//     e.preventDefault();

//     let formData = new FormData(this); 
//     axios.post("{{ route('send.message') }}", formData, {
//         headers: {
//             'Content-Type': 'multipart/form-data'
//         }
//     }).then(res => {
//         document.getElementById('message').value = '';
//         document.getElementById('fileInput').value = '';

//         const m = res.data.message;
//         const box = document.getElementById('messages');
//         const div = document.createElement('div');
//         div.className = 'message me';

//         if (m.image) {
//             div.innerHTML = `<strong>${m.sender_name}:</strong> 
//                              <img src="${m.image}" class="img-fluid" style="max-width:150px;border-radius:8px">
//                              <small>${new Date(m.created_at).toLocaleTimeString()}</small>`;
//         } else {
//             div.innerHTML = `<strong>${m.sender_name}:</strong> ${m.message} 
//                              <small>${new Date(m.created_at).toLocaleTimeString()}</small>`;
//         }

//         box.appendChild(div);
//         box.scrollTop = box.scrollHeight;
//     }).catch(err => console.error(err));
// });

  document.getElementById('chatForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const message = document.getElementById('message').value;
      const receiverId = {{ $receiver->id }};

      axios.post("{{ route('send.message') }}", {
          message: message,
          receiver_id: receiverId
      }).then(res => {
          document.getElementById('message').value = '';

         
          const m = res.data.message;
          const box = document.getElementById('messages');
          const div = document.createElement('div');
          div.className = 'message me';
          div.innerHTML = `<strong>${m.sender_name}:</strong> ${m.message} <small>${new Date(m.created_at).toLocaleTimeString()}</small>`;
          box.appendChild(div);
          box.scrollTop = box.scrollHeight;
      }).catch(err => console.error(err));
  });

  
  window.Echo.private('chat.{{ auth()->id() }}')
    
    .listen('.MessageSent', (e) => {
        const box = document.getElementById('messages');
        const div = document.createElement('div');
        div.className = e.sender_id === {{ auth()->id() }} ? 'message me' : 'message them';
        div.innerHTML = `<strong>${e.sender_name}:</strong> ${e.message} <small>${new Date(e.created_at).toLocaleTimeString()}</small>`;
        box.appendChild(div);
        box.scrollTop = box.scrollHeight;

        
    });
    

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection



