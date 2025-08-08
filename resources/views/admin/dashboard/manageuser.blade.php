@extends('admin.adminMaster')
@section('admintitle')
    manageUser
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
<div class="main-content">
   <div class="col-12 info col-sm-10 col-md-7 ms-md-5 col-lg-11 ms-lg-5">
    
    <h2 class="mb-4" style="color: white ">Manage Users</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Skill to share</th>
          <th>Wants to share</th>
          <th>Achivements</th>
          <th>Profile</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            
       

        <!-- Sample Row -->
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->lastname }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phone }}</td>
          <td>{{ $user->sellist1 ?? 'Not Selected' }}</td>
          <td>{{ $user->sellist2 ?? 'Not Selected' }}</td>
          <td>
            <a href="{{ asset('pdfs/' . basename($user->pdf)) }}" target="_blank">View File</a>

            </td>
             
         <td>
    @if (!empty($user->profile) && file_exists(public_path('uploads/' . $user->profile)))
        <a href="{{ asset('uploads/' . $user->profile) }}" target="_blank">
            <img src="{{ asset('uploads/' . $user->profile) }}" alt="User Photo" width="50" height="50">
        </a>
    @else
        No Image
    @endif
</td>
          <td>
            {{-- <button class="btn btn-sm" id="button">Edit</button> --}}
            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm" id="button">Delete</button>
        </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection