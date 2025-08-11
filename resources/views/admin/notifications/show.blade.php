@extends('admin.adminMaster')

@section('content')
<div class="container mt-4">
    <h2>Notification Detail</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Message:</strong> {{ $notification->data['message'] ?? 'No message available' }}</p>
            <p><strong>Received:</strong> {{ $notification->created_at->format('d M Y, h:i A') }}</p>
        </div>
    </div>

    {{-- <a href="{{ route('admin.notifications') }}" class="btn btn-secondary mt-3">Back to Notifications</a> --}}
</div>
@endsection
