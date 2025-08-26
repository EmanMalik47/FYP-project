<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Barter Brains - @yield('title')</title>
@yield('styles')

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header>
    @php
    $count = Auth::check() ? auth()->user()->unreadNotifications()->count() : 0;
@endphp
       <nav class="navbar navbar-expand-lg fixed-top shadow p-3 mb-5 bg-white rounded" id="Nav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/welcome') }}">
                <img src="../images/logo.png" class="img-fluid me-5 max-auto d-block" height="200" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5 me-5 ps-2" id="navbarNav">
                   <ul class="navbar-nav ms-4 me-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-6 ps-5 pe-2">
                        <a class="nav-link rounded-pill" href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item  fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="{{ url('/trainers') }}">Trainers</a>
                    </li>
                    
                    <li class="nav-item fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="{{ url('/certificates') }}">Certificates</a>
                    </li>
                    <li class="nav-item fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="{{ url('/users') }}">Users</a>
                    </li> 
                </ul>
                <div class="icons position-relative">
    {{-- Search --}}
    <a id="searchBtn">
        <i class="fa-solid fa-magnifying-glass" style="color: #1f3d85;"></i>
        <form method="GET" action="{{ route('searchSkill') }}">
            <div id="searchDropdown" class="search-dropdown">
                <div class="input-group" id="input-main">
                    <span class="input-group-text bg-white border-0"><i class="fas fa-search"></i></span>
                    <input type="text" name="skills" class="form-control border-0" placeholder="Search">
                </div>
            </div>
        </form>
    </a>

    {{-- Profile --}}
    <a onclick="window.location.href='{{ url('/profile') }}';">
        <i class="fa-solid fa-user" style="color: #1f3d85;"></i>
    </a>

    {{-- Contact --}}
    <a onclick="window.location.href='{{ url('/contact') }}';">
        <i class="fa-solid fa-phone-volume" style="color: #1f3d85;"></i>
    </a>
<!-- Friends List Dropdown -->
   @php
    $totalUnread = \App\Models\Message::where('receiver_id', Auth::id())
        ->where('is_read', false)
        ->count();
    @endphp


<div class="dropdown d-inline-block">
    <a class="nav-link position-relative" href="#" id="friendsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user-group" style="color: #1f3d85;"></i>
        @if($totalUnread > 0)
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                {{ $totalUnread }}
            </span>
        @endif
    </a>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="friendsDropdown" id="friendsMenu">
        @foreach(Auth::user()->friends() as $friend)
            @php
                $unread = \App\Models\Message::where('sender_id', $friend->id)
                    ->where('receiver_id', Auth::id())
                    ->where('is_read', false)
                    ->count();
            @endphp

            <li class="d-flex justify-content-between align-items-center px-2">
                <a class="dropdown-item flex-grow-1 d-flex align-items-center" href="{{ route('user.profile', ['id' => $friend->id]) }}">
                    <i class="fa-solid fa-user me-1" style="color: #1f3d85;"></i>
                    {{ $friend->fname ?? $friend->name }}
                   
                </a>

                <a href="{{ route('chat', ['id' => $friend->id]) }}" class="ms-2 text-decoration-none">
                    <i class="fa-brands fa-facebook-messenger" style="color: #1f3d85; font-size: 16px;"></i>
                    @if($unread > 0)
                     <span class="position-absolute top:14px; right:18px; translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                       
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</div>



    {{-- Notifications --}}
@if(Auth::check())
@php
    $count = auth()->user()->unreadNotifications->count();
@endphp

<div class="dropdown d-inline-block me-2">
    <a class="position-relative" href="#" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-bell" style="color: #1f3d85; font-size: 18px;"></i>
        @if($count > 0)
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                {{ $count }}
            </span>
        @endif
    </a>

    <ul class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationDropdown">
        @forelse(auth()->user()->unreadNotifications as $notification)
            <li class="notification-item">
               <a href="{{ $notification->data['url'] }}">
    <i class="fa-solid fa-bell"></i>
    {{ $notification->data['message'] }}
</a>

            </li>
        @empty
            <li class="notification-empty">
                <span>No notifications yet</span>
            </li>
        @endforelse
    </ul>
</div>
@endif

</div>

            </div>
        </div>
    </nav>
</header>

<main class="mt-5 pt-5">
    @yield('content')
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // search button 
    $(document).ready(function(){
        $("#searchBtn").click(function(){
            $("#searchDropdown").toggle();
        });
        
        $("#searchDropdown").click(function(event){
        event.stopPropagation();
    });
        
        $(document).click(function(event) { 
            if(!$(event.target).closest('#searchBtn').length) {
                $("#searchDropdown").hide();
            }        
        });
    });
    


// Notifications
function markNotificationRead(id, redirectUrl) {
    fetch(`/notifications/${id}/read`, { 
        method: 'POST', 
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(() => {
        window.location.href = redirectUrl;
    });
}


</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>