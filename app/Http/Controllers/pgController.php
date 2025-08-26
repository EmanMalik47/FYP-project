<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\JoinWeb;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Certificate;
use App\Notifications\FriendRequestNotification;
use App\Notifications\AdminNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ContactUs;
use Carbon\Carbon;

class pgController extends Controller

{
    public function showwelcome(){
        return view('welcome');

    }
    
    public function showservices(){
        return view('services');
    }
    public function showtrainers(){
        $feedbacks = ContactUs::orderBy('created_at', 'desc')->take(4)->get();

        return view('trainers', compact('feedbacks'));
        // return view('trainers');
    }
    public function showcertificates(){
        $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    
    $joinWeb = JoinWeb::where('email', $user->email)->first();
    $userSkills = [];
    if ($joinWeb && $joinWeb->sellist2) {
        
        $userSkills = array_map('trim', explode(',', $joinWeb->sellist2));
    }
  
    return view('certificates', compact('user', 'userSkills'));

    }
     public function getCertificate($skill){
       
        $user = Auth::user();
        if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }
        
        $friendship = DB::table('friends')
        ->where('user_id', $user->id)
        ->orWhere('friend_id', $user->id)
        ->orderBy('created_at', 'asc') 
        ->first();

    if (!$friendship) {
        return redirect()->back()->with('error', 'Friendship record not found.');
    }

    $from = Carbon::parse($friendship->created_at)->format('Y-m-d');
    $to   = Carbon::parse($from)->addMonth()->format('Y-m-d');

    $data = [
        'name'     => $user->name,
        'lastname' => $user->lastname,
        'date'     => now()->format('Y-m-d'),
        'skill'    => $skill,
        'from'     => $from,
        'to'       => $to,
        'bg_image' => public_path('images/paper.png')
    ];

    return view('getCertificate', compact('data'));
    
    }
    

public function generate(Request $request)
{
    $user = Auth::user();
    $skill = $request->skill;

    $certificate = Certificate::where('user_id', $user->id)->where('skill', $skill)->first();

    if ($certificate) {
        if ($certificate->download_count >= 1) {
            return back()->with('error', 'Your limit to download this certificate has been exceeded.');
        }
        $certificate->increment('download_count');
    } else {
        $certificate = Certificate::create([
            'user_id'   => $user->id,
            'user_name' => $user->name,
            'skill'     => $skill,
            'downloaded_at' => now(),
            'download_count' => 1,
        ]);
    }
    $data = [
        'name'     => $user->name,
        'lastname' => $user->lastname,
        'skill'    => $skill,
        'date'     => now()->format('Y-m-d'),
        'from'     => now()->subMonth()->format('Y-m-d'),
        'to'       => now()->format('Y-m-d'),
    ];

    $pdf = Pdf::loadView('certificate_pdf', compact('data'));

    return $pdf->download("{$skill}_certificate.pdf");
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


    $users = JoinWeb::where('id', '!=', Auth::id())->get();
    return view('users', compact('users'));
}

    public function showcontact(){
        return view('contact');
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
public function show($id)
{
    $user = \App\Models\JoinWeb::findOrFail($id);
    return view('ibPROFILE', compact('user'));
}

// Inbox Profile

public function inboxProfile($id)
{
    $friend = \App\Models\JoinWeb::findOrFail($id);
    $user = Auth::user();

    return view('ibPROFILE', compact('friend', 'user'));
}

 public function showjoinUs()
    {
        return view('joinUs'); 
    }

}