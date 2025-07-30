<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function showprofile($id){
        $user = JoinWeb::find($id);
        // $joins=JoinWeb::all();
        // dd($joins);
        return view('profile',['user' => $user]);
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
