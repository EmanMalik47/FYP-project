<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinWeb;
class pgController extends Controller
{
    public function showwelcome(){
        return view('welcome');

    }
    
    public function showservices(){
        return view('services');
    }
    public function showtrainers(){
        return view('trainers');
    }
    public function showcertificates(){
        return view('certificates');
    }
     public function getCertificate(){
        
        return view('getCertificate');
    }
     public function showjoinUs(){
        return view('joinUs');
    }
 public function showProfile()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    return view('profile', compact('user'));
}

    public function showcontact(){
        return view('contact');
    }
    public function showeman(){
        return view('eman');
    }
     public function showopen(){
        return view('open');
    }
    public function view()
{
  $user = session('user'); 

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    return view('profile', compact('user')); 
}

    
}
