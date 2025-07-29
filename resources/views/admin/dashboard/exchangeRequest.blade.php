@extends('admin.adminMaster')
@section('admintitle')
    exchangeRequest
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
   <div class="container mt-5">
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
        <tr>
          <td>501</td>
          <td>Ayesha</td>
          <td>Hassan</td>
          <td>Cooking</td>
          <td>Guitar</td>
          <td>Pending</td>
          <td>
            <button class="btn btn-sm" id="button">Approve</button>
            <button class="btn btn-sm" id="button">Reject</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
