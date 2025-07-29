@extends('admin.adminMaster')
@section('admintitle')
    manageSkills
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
   <div class="container mt-5">
    <h2 class="mb-4" style="color: white">Manage Skills</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Skill ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Created By</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>101</td>
          <td>Web Development</td>
          <td>IT</td>
          <td>Ali Khan</td>
          <td>Pending</td>
          <td>
            <button class="btn btn-sm" id="button">Approve</button>
            <button class="btn btn-sm" id="button">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection