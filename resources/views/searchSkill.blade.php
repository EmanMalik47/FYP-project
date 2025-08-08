@extends('layout.masterp') 

@section('styles')
    <link rel="stylesheet" href="{{asset('css/searchSkill.css')}}">

@endsection

@section('content')


  <div class="container mt-4">
    <br><br><br><br>
    @if(count($users) > 0)
    <h3 style="color:#0f2862 ">Search Results for "{{ $skill }}"</h3>

    <br>    
      <div class="row">
        @foreach($users as $user)
          <div class="col-md-4">
            <div class="card mb-3 shadow">
              <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text">Skill Provide: {{ $user->sellist1 }}</p>
                <p class="card-text">Wanted Skill: {{ $user->sellist2 }}</p>
                <a href="{{ route('search.profile', ['id' => $user->id]) }}" class="btn" style="background-color:#0f2862; color:white">View Profile</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <p>No users found with this skill.</p>
    @endif
  </div>
@endsection
