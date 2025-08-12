{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>hh</p>
</body>
</html> --}}
<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat with {{ $receiver->name }}</title>
    @vite(['resources/js/app.js']) <!-- make sure Vite builds this -->
    <style>
        /* simple styles */
        #messages { list-style: none; padding: 0; max-width:600px; margin: 10px auto; }
        #messages li { padding:8px 12px; margin:6px 0; border-radius:8px; max-width:80%; }
        .me { background:#d1ffd6; margin-left:auto; text-align:right; }
        .them { background:#f1f1f1; margin-right:auto; text-align:left; }
        #chatBox { max-width:600px; margin: 0 auto; padding: 10px; }
        form { display:flex; gap:8px; }
        input[type="text"]{ flex:1; padding:8px; }
    </style>
</head>
<body>
<div id="chatBox">
    <h3>Chat with {{ $receiver->name }}</h3>

    <ul id="messages">
        @foreach($messages as $m)
            <li class="{{ $m->sender_id === auth()->id() ? 'me' : 'them' }}">
                <strong>{{ $m->sender->name }}:</strong> {{ $m->message }} <br>
                <small>{{ $m->created_at->format('H:i') }}</small>
            </li>
        @endforeach
    </ul>

    <form id="chatForm">
        @csrf
        <input type="text" id="message" placeholder="Type a message..." autocomplete="off">
        <button type="submit">Send</button>
    </form>
</div>

<script>
    // Pass needed server values to JS
    window.Laravel = {
        userId: {{ auth()->id() }},
        receiverId: {{ $receiver->id }},
        sendMessageUrl: "{{ route('send.message') }}"
    };
</script>
</body>
</html>
