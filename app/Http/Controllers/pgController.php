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
     public function showjoinUs(){
        return view('joinUs');
    }
   public function showProfile()
    {
        $user = Auth::user();
    return view('profile', compact('user')); 
    if (!$user) {
        abort(404, 'User not found');
    }

    return view('profile', ['user' => $user]);
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
    
}
