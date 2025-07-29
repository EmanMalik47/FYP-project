@extends('admin.adminMaster')
@section('admintitle')
    Reports
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
     <div class="container mt-5">
    <h2 class="mb-4" style="color: white">Reports</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Report ID</th>
          <th>User</th>
          <th>Issue</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>201</td>
          <td>Sana</td>
          <td>Inappropriate content</td>
          <td>2025-07-20</td>
          <td>Pending</td>
          <td>
            <button class="btn btn-sm " id="button">Review</button>
            <button class="btn btn-sm " id="button">Dismiss</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
