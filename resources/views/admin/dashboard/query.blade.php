@extends('admin.adminMaster')
@section('admintitle')
    Queries
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection
@section('adminContent')
    <div class="main-content">
     <div class="container info col-md-12 col-lg-10">
    <h2 class="mb-4 col-md-12" style="color: white">Queries</h2>
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
          <td>{{ $query->firstname }}</td>
          <td>{{ $query->lastname }}</td>
           <td>{{ $query->email }}</td>
          <td>{{ $query->message }}</td>
         
          <td>Pending</td>
          <td>
            {{-- <button class="btn btn-sm " id="button">Review</button> --}}
            <form action="{{ route('admin.query.dismiss', $query->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to dismiss this query?');" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-sm" id="button">Dismiss</button>
            </form>
           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

  
@endsection
