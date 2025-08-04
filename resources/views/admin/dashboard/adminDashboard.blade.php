@extends('admin.adminMaster')

@section('admintitle')
    Dashboard
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/dashboard.css')}}">
@endsection
@section('adminContent')
  <main class="main-content container py-4 px-3">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-7 ms-md-5 col-lg-8">
            <section class="stat-item mb-3 p-3 text-center shadow-sm rounded bg-light">
                <span class="stat-label fw-bold d-block">Total Users:</span>
                <span class="stat-value">{{ $totalUsers }}</span>
            </section>
            <section class="stat-item mb-3 p-3 text-center shadow-sm rounded bg-light">
                <span class="stat-label fw-bold d-block">Active Exchanges:</span>
                <span class="stat-value">12</span>
            </section>
            <section class="stat-item mb-3 p-3 text-center shadow-sm rounded bg-light">
                <span class="stat-label fw-bold d-block">Feedback:</span>
                <span class="stat-value">{{ $totalQueries }}</span>
            </section>
        </div>
    </div>
</main>
@endsection