@extends('admin.adminMaster')
@section('admintitle')
    exchangeRequest
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
<div class="main-content">
   <div class="container mt-5 ">
    <h2 class="mb-4" style="color: white">Exchange Requests</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Request ID</th>
          <th>Sender</th>
          <th>Receiver</th>
          <th>Offered Skill</th>
          <th>Requested Skill</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
    <tbody>
    @foreach ($requests as $request)
    <tr>
        <td>{{ $request->id }}</td>
        <td>{{ $request->sender->name ?? 'N/A' }}</td>
        <td>{{ $request->receiver->name ?? 'N/A' }}</td>
        <td>{{ $request->sender->sellist1 ?? 'N/A' }}</td>
        <td>{{ $request->receiver->sellist2 ?? 'N/A' }}</td>
        <td>{{ ucfirst($request->status) }}</td>
        <td>
            @if ($request->status === 'pending')
                <form method="POST" action="{{ route('admin.friend.respond', [$request->id, 'accepted']) }}" style="display:inline;">
                    @csrf
                    <button class="btn btn-success btn-sm">Approve</button>
                </form>

                <form method="POST" action="{{ route('admin.friend.respond', [$request->id, 'rejected']) }}" style="display:inline;">
                    @csrf
                    <button class="btn btn-danger btn-sm">Reject</button>
                </form>
            @else
                <span class="text-muted">Handled</span>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>
    </table>
  </div>
</div>
@endsection
