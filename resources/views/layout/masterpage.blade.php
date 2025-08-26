<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Barter Brains - @yield('title')</title>
@yield('styles')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>



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