@extends('admin.adminMaster')

@section('admintitle', 'Admin Notifications')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/manageuser.css') }}">
@endsection

@section('adminContent')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-2 col-md-3 d-none d-md-block sidebar-fixed">
            
        </div>

        <!-- Main Content Column -->
        <div class="col-lg-10 col-md-9 col-12 mt-5">
            <h2 class="mb-4" style="color: white;">Admin Notifications</h2>

            @if($notifications->count() > 0)
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($notifications as $n)
                                <li class="list-group-item notification-item">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div>
                                            <strong>{{ $n->data['message'] ?? 'No message' }}</strong>
                                            <div class="text-muted small">
                                                {{ $n->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    No notifications found.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
