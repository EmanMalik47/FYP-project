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
          <th>Created By</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($skills as $skill)
        <tr>
          <td>{{ $skill->id }}</td>
          <td>{{ $skill->sellist1 }}</td>
          <td>{{ $skill->name }}</td>

         
          <td>Pending</td>
<td>
           <form action="{{ route('admin.query.dismissed', $skill->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to dismiss this skill?');" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-sm" id="button">Dismissed</button>
            </form>
</td>
        </tr>
        @endforeach


      </tbody>
    </table>
  </div>
@endsection