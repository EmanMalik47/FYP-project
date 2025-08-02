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
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Querry</th>
          
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($queries as $query)
        <tr>
          <td>{{ $query->id }}</td>
          <td>{{ $query->name }}</td>
          <td>{{ $query->lastname }}</td>
           <td>{{ $query->email }}</td>
          <td>{{ $query->message }}</td>
         
          <td>Pending</td>
          <td>
            <button class="btn btn-sm " id="button">Review</button>
            <button class="btn btn-sm " id="button">Dismiss</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
@endsection
