@extends('admin.adminMaster')

@section('admintitle')
    Certificates
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/manageuser.css')}}">
@endsection

@section('adminContent')
<div class="main-content">
   <div class="col-12 info col-sm-10 col-md-7 ms-md-5 col-lg-11 ms-lg-5">
    <h2 class="mb-4" style="color: white ">Certificates</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Certificate ID</th>
                <th>User Name</th>
                <th>Skill</th>
                <th>Downloaded At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($certificates as $certificate)
                <tr>
                    <td>{{ $certificate->id }}</td>
                    <td>{{ $certificate->user_name ?? 'N/A' }}</td>
                    <td>{{ $certificate->skill }}</td>
                    <td>{{ $certificate->downloaded_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No certificates downloaded yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection
