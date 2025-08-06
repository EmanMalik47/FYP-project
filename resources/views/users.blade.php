@extends('layout.masterp')

@section('title')
    Users
@endsection
<link rel="stylesheet" href="{{asset('css/users.css')}}">

@section('content')

<div class="mt-3">.</div>
<div class="container mt-5">
    <h2 class="page-title mb-3 text-center col-12" style="color: #1f3d85;  font-weight: bold; font-size:40px; ">Connect with Other Learners</h2>

    <div class="user-grid col-lg-11 ms-5 ps-5 col-md-12 col-sm-12">
     
    @foreach ($users as $user)
        <div class="user-vertical-card ms-4">
            <img src="{{ asset('uploads/' . $user->profile) }}" alt="Profile Image" class="vertical-profile-img">

            <div class="user-info">
                <h4 class="user-name">{{ $user->name }} {{ $user->lastname }}</h4>
                <p class="user-sub"><strong>Teach:</strong> {{ $user->sellist1 ?? 'Not Selected' }}</p>
                <p class="user-sub"><strong>Learn:</strong> {{ $user->sellist2 ?? 'Not Selected' }}</p>

                @php
                    $requested = \App\Models\FriendRequest::where('sender_id', auth()->id())
                                  ->where('receiver_id', $user->id)
                                  ->where('status', 'pending')
                                  ->exists();
                @endphp

                <div class="btn-group ">
                    @if (!$requested && $user->id != auth()->id())
                        <form method="POST" action="{{ route('friend.send', $user->id) }}">
                            @csrf
                            <button type="submit" class="friend-confirm">Send Friend Request</button>
                        </form>
                        {{-- <a href="{{ route('user.profile.view', $user->id) }}" class="friend-view">View Profile</a> --}}
                        <a href="/user-profile/{{ $user->id }}" class="friend-view">View Profile</a>

                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

@endsection


 
