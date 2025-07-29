@extends('admin.adminMaster')
@section('admintitle')
    manageUser
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
   <div class="container mt-5">
    <h2 class="mb-4" style="color: white">Manage Users</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Sample Row -->
        <tr>
          <td>1</td>
          <td>Ali Khan</td>
          <td>ali@example.com</td>
          <td>User</td>
          <td>Active</td>
          <td>
            <button class="btn btn-sm" id="button">Edit</button>
            <button class="btn btn-sm" id="button">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection