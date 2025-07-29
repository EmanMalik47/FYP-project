<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function showprofile(){
        // $joins=JoinWeb::all();
        // dd($joins);
        return view('profile');
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
