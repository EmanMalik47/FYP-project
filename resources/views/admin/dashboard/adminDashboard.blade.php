@extends('admin.adminMaster')
@section('admintitle')
    Dashboard
@endsection
@section('adminContent')
    <main class="main-content col-md-6 col-lg-7">
      <section class="stat-item"><span class="stat-label">Total Users:</span> {{ $totalUsers }}</section>
      <section class="stat-item"><span class="stat-label">Active Exchanges:</span> 12</section>
      <section class="stat-item"><span class="stat-label">Feedback:</span> {{$totalQueries}}</section>
    </main>
@endsection