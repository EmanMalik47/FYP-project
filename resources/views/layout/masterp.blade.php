<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Barter Brains - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<header>
    @php
    $count = Auth::check() ? auth()->user()->unreadNotifications()->count() : 0;
@endphp
       <nav class="navbar navbar-expand-lg fixed-top shadow p-3 mb-5 bg-white rounded" id="Nav">
        <div class="container">
            <a class="navbar-brand" href="welcome">
                <img src="../images/logo.png" class="img-fluid me-5 max-auto d-block" height="200" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5 me-5 ps-2" id="navbarNav">
                   <ul class="navbar-nav ms-4 me-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-6 ps-5 pe-2">
                        <a class="nav-link rounded-pill" href="services">Services</a>
                    </li>
                    <li class="nav-item  fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="trainers">Trainers</a>
                    </li>
                    
                    <li class="nav-item fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="certificates">Certificates</a>
                    </li>
                    <li class="nav-item fs-6  ps-2 pe-2">
                        <a class="nav-link rounded-pill" href="users">Users</a>
                    </li> 
                </ul>
                
                 <div class="icons position-relative">
                    <a id="searchBtn"> 
                        <i class="fa-solid fa-magnifying-glass" style="color: #1f3d85;"></i>
                        <form method="GET" action="{{ route('searchSkill') }}">
                        <div id="searchDropdown" class="search-dropdown">
                            <div class="input-group" id="input-main">
                                <span class="input-group-text bg-white border-0"><i
                                        class="fas fa-search"></i></span>
                                <input type="text" name="skills" class="form-control border-0"
                                    placeholder="Search " src="">
                                    
                            </div>
                        </div>
                        </form>
                    </a>
                    <a><i class="fa-solid fa-user" style="color: #1f3d85;" onclick="window.location.href='profile';"></i></a>
                    <a><i class="fa-solid fa-phone-volume" style="color: #1f3d85;" onclick="window.location.href='contact';"></i></a>
                    {{-- <a><i class="fa-solid fa-user-group" style="color: #1f3d85;" onclick="window.location.href='#';"></i></a> --}}
                    
                    <!-- Friends Dropdown -->
                        <li class="nav-item dropdown">
                            <a href="#" id="friendsDropdown" role="button">
                                <i class="fa-solid fa-user-group" style="color: #1f3d85;"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="friendsDropdown" id="friendsMenu">
                                @if(Auth::check() && Auth::user()->friends && Auth::user()->friends->count() > 0)
                                    @foreach(Auth::user()->friends as $friend)
                                    @php
                                    $joinWebId = $friend->id;
                                        // $joinWebId = \App\Models\JoinWeb::where('id', $friend->id)->value('id');
                                    @endphp
                                        @if($joinWebId)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('inboxProfile',  $joinWebId) }}">
                                                <i class="fa-solid fa-user"></i> {{ $friend->fname ?? $friend->name }}
                                            </a>
                                        </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li><span class="dropdown-item text-muted">No friends found</span></li>
                                @endif
                            </ul>
                        </li>


                    
                     {{-- Notification icon --}}
                    @if(Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link position-relative" href="#" id="notificationDropdown" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-bell"  style="color: #1f3d85;"></i>
                          @if($count > 0)
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                {{ $count }}
            </span>
        @endif</a>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @foreach(auth()->user()->unreadNotifications as $n)
                                <li>
                                    <a href="javascript:void(0)" 
                                       class="dropdown-item"
                                       onclick="markNotificationRead('{{ $n->id }}')">
                                        {{ $n->data['message'] ?? 'No message' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
</header>

<main class="mt-5 pt-5">
    @yield('content')
</main>

<script>
    // search button 
    $(document).ready(function(){
        $("#searchBtn").click(function(){
            $("#searchDropdown").toggle();
        });
        // Prevent closing when clicking inside the dropdown
        $("#searchDropdown").click(function(event){
        event.stopPropagation();
    });
        // Close when clicking outside
        $(document).click(function(event) { 
            if(!$(event.target).closest('#searchBtn').length) {
                $("#searchDropdown").hide();
            }        
        });
    });
    
    // friends
    document.getElementById('friendsDropdown').addEventListener('click', function (e) {
        e.preventDefault();
        let menu = document.getElementById('friendsMenu');
        menu.classList.toggle('show');
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function (e) {
        let menu = document.getElementById('friendsMenu');
        let btn = document.getElementById('friendsDropdown');
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.remove('show');
        }
    });



    // Notifications
    function markNotificationRead(id) {
        fetch(`/notifications/${id}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        }).then(() => {
            window.location.href = '/friend-requests';
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
