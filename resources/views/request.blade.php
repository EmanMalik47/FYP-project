@extends('layout.masterp')

@section('title', 'Pending Friend Requests')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mt-3" style="font-weight: bold; font-size:35px">Pending Friend Requests</h3>

    @forelse ($friendRequests as $friendRequest)
        <div class="card p-3 mb-3">
            <h5>
                {{ $friendRequest->sender->fname ?? $friendRequest->sender->name ?? 'User' }} 
                wants to connect with you
            </h5>

            <form method="POST" action="{{ route('friend.respond', [$friendRequest->id, 'accept']) }}">
                @csrf
                <button type="submit" class="btn btn-success">Accept</button>
            </form>

            <form method="POST" action="{{ route('friend.respond', [$friendRequest->id, 'reject']) }}" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
    @empty
       <p id="noRequestsMsg" 
   style="color: red;  font-size:25px; opacity:0; transition: opacity 1s ease-in-out;" 
   class="text-center mt-3">
   No pending friend requests!
</p>
    @endforelse
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let msg = document.getElementById("noRequestsMsg");
        setTimeout(() => {
            msg.style.opacity = 1; // smooth fade-in
        }, 200); 
    });
</script>
@endsection
