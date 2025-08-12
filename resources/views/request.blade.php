@extends('layout.masterp')

@section('title', 'Pending Friend Requests')

@section('content')
<div class="container mt-5">
    <h3>Pending Friend Requests</h3>

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
        <p>No pending friend requests.</p>
    @endforelse
</div>
@endsection
