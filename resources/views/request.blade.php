@extends('layout.masterp')

@section('title', 'Pending Friend Requests')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mt-3" style="font-weight: bold; font-size:35px">
        Pending Friend Requests
    </h3>

    @forelse ($friendRequests as $friendRequest)
        <div class="card p-3 mb-3" style=" border: 1px solid #e0e0e0;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);">
            <h3>
                {{ $friendRequest->sender->fname ?? $friendRequest->sender->name ?? 'User' }} 
                wants to connect with you
            </h3>
<div style="display: flex; gap: 16px;">
    <button 
        class="btn accept-request" 
        style="background-color: #0f2862; color: white; width: 100px;" 
        data-id="{{ $friendRequest->id }}">
        Accept
    </button>

    <button 
        class="btn btn-secondary reject-request" 
        style="width: 100px;" 
        data-id="{{ $friendRequest->id }}">
        Reject
    </button>
</div>


        </div>
    @empty
        <p id="noRequestsMsg" 
            style="color: red; font-size:25px; opacity:0; transition: opacity 1s ease-in-out;" 
            class="text-center mt-3">
            No pending friend requests!
        </p>
    @endforelse
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $(".accept-request").on("click", function () {
            let requestId = $(this).data("id");

            $.ajax({
                url: "/friend-request/respond/" + requestId + "/accept",
                type: "POST",
                data: { _token: "{{ csrf_token() }}" },
                success: function (res) {
                    if (res.status === "success") {
                        Swal.fire({
                            title: ' Congratulations!',
                            text: "You and " + res.friend_name + " are friends now!",
                            icon: 'success',
                            confirmButtonText: 'Go to Profile',
                            confirmButtonColor: '#0f2862',
                            showCancelButton: true,
                            cancelButtonText: 'Back',
                        }).then(() => {
                            // Refresh notifications
                            $(".notification-count").text("0");

                            // Redirect to profile
                            window.location.href = res.redirect_url;
                        });
                    }
                }
            });
        });

        $(".reject-request").on("click", function () {
            let requestId = $(this).data("id");

            $.ajax({
                url: "/friend-request/respond/" + requestId + "/reject",
                type: "POST",
                data: { _token: "{{ csrf_token() }}" },
                success: function (res) {
                    if (res.status === "rejected") {
                        Swal.fire({
                            title: 'Request Rejected',
                            text: res.message,
                            icon: 'info',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload(); 
                        });
                    }
                }
            });
        });

        // Fade-in effect for "No Requests" message
        let msg = document.getElementById("noRequestsMsg");
        if (msg) {
            setTimeout(() => {
                msg.style.opacity = 1;
            }, 200);
        }
    });
</script>
@endsection
