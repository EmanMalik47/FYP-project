<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('chatbox')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

   
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<header>
    {{-- @php
    $count = Auth::check() ? auth()->user()->unreadNotifications()->count() : 0;
@endphp --}}
       {{-- <nav class="navbar navbar-expand-lg fixed-top shadow p-3 mb-5 bg-white rounded" id="Nav"> --}}
      <div class="navbar-expand fixed-top shadow p-3 mb-5 bg-white rounded" id="Nav">
    <a class="navbar-brand d-block text-center" href="{{ url('/welcome') }}">
        <img src="../images/logo.png" class="img-fluid mx-auto d-block" height="200" width="200">
    </a>
</div>

</header>

<main class="mt-5 pt-5">
    @yield('content')
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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