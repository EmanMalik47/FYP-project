@extends('layout.masterp')

@section('title')
    Profile
@endsection
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

@section('content')

    <div class="hero mt-3">
        <div class="wave"></div>
        <div class="profile-header text-center">
            <img src="{{ asset('uploads/' .$user->profile) }}" class="rounded-circle profile-pic" alt="Profile Picture" onclick="alert('Profile picture clicked!')">
            <h1 class="mt-3">{{ $user->name }}</h1>
            <p class="lead" style="font-style: italic">Creative Skill Enthusiast</p>
        </div>
    </div>
    <section class="detail">
        <div class="container">
            <div class="about row mt-5"  >
                <div class="col-md-7 info  p-4">
                    <h3 style="margin-top: 8px">About Me</h3>
                    <div class="input">
                        {{ $user->about ?? 'No about information available' }}
                     </div>
                    <h3>Skills to Share</h3>
                      <div class="input">
                       {{ $user->sellist1 ?? 'Not Selected' }}
                   </div>
                    <h3>Skills I Want to Learn</h3>
                      <div class="input">
                       {{ $user->sellist2 ?? 'Not Selected' }}
                      </div>
                    <h3>Connect with me</h3>
                      <div class="input">
                        @if(isset($user))
                          {{ $user->phone ?? 'Phone number not available' }}
                        @else
                          <p>User not found</P>
                        @endif
                    
                      </div>
                </div>
                <div class="col-md-5">
                    <div class="sidebar">
                        <h3>Facilities I Provide</h3>
                        <div class="facility-item">
                            {{ $user->facilities ?? 'No facilities listed' }}
                        </div>
                        <h3 style="margin-top: 10px">My Achievements</h3>
                        <div class="facility-item">
                              @if(!empty($user->pdf) && file_exists(public_path('pdfs/' . $user->pdf)))
        <a href="{{ asset('pdfs/' . $user->pdf) }}" target="_blank">
            {{ $user->pdf }}
        </a>
    @else
        No achievements listed
    @endif
                        </div>
                    </div>
                     <div class=" button-end  mt-5 col-md-6 col-lg-3">
                        @if(Auth::check())
            <button type="button" class="btn fw-bold text-white capitalize ms-2 text-6xl" style="color: #1f3d85;"
        onclick="window.location.href='{{ route('chat', $user->id) }}';">
        Chat
</button>
                        
                        @endif
            </div>
                </div>
            </div>
           
        </div>
    </section>
    <br><br>





@endsection