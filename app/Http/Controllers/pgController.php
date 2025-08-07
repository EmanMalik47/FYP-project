<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinWeb;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    // Fetch user's learned skills from join_webs table
    $userSkills = JoinWeb::where('email', $user->email)->pluck('sellist2')->toArray();

    return view('certificates', compact('user', 'userSkills'));


        // return view('certificates');
    }
     public function getCertificate(Request $request){
        $user = Auth::user();
    $skill = $request->query('skill'); // from URL
    $date = now()->format('d-m-Y');

    return view('getCertificate', compact('user', 'skill', 'date'));


        // return view('getCertificate');
    }
    public function generate(Request $request)
    {
        $data = $request->only(['name', 'date', 'so', 'skill', 'from', 'to']);

        $pdf = Pdf::loadView('certificate_pdf', ['data' => $data]);
       // BG img of pdf
    //    $pdf->setOptions([
    //     'isHtml5ParserEnabled' => true,
    //     'isRemoteEnabled' => true
    // ]);
        return $pdf->download('certificate.pdf');
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

public function showAllUsers() {
    $users = JoinWeb::all(); // or filter out logged-in user if needed
    return view('users', compact('users'));
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
public function showUserProfile($id)
{
    $user = \App\Models\JoinWeb::findOrFail($id);
    return view('profile', compact('user'));

}
    
}
