@extends('admin.adminMaster')
@section('admintitle')
    Certificates
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
   <div class="container mt-5">
    <h2 class="mb-4" style="color: white">Certificates</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Category ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Programming</td>
          <td>All development-related skills</td>
          <td>
            <button class="btn btn-sm" id="button">Edit</button>
            <button class="btn btn-sm " id="button">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
