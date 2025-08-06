@extends('layout.masterp')

@section('title')
    'Friend Requests'
@endsection

@section('content')
<div class="container mt-5">
    <h3>Pending Friend Requests</h3>

    @foreach ($requests as $request)
        <div class="card p-3 mb-3">
            <h5>{{ $request->sender->name }} wants to connect with you</h5>
            <form method="POST" action="{{ route('friend.respond', [$request->id, 'accept']) }}">
                @csrf
                <button type="submit" class="btn btn-success">Accept</button>
            </form>

            <form method="POST" action="{{ route('friend.respond', [$request->id, 'reject']) }}" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-danger">Reject</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
