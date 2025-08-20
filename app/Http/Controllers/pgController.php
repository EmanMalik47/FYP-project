<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\JoinWeb;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\FriendRequestNotification;
use App\Notifications\AdminNotification;
use Barryvdh\DomPDF\Facade\Pdf;
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
        return view('trainers');
    }
    public function showcertificates(){
        $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    // Fetch user's learned skills from join_webs table
    $joinWeb = JoinWeb::where('email', $user->email)->first();
    $userSkills = [];
    if ($joinWeb && $joinWeb->sellist2) {
        
        $userSkills = array_map('trim', explode(',', $joinWeb->sellist2));
    }
    // $userSkills = JoinWeb::where('email', $user->email)->pluck('sellist2')->toArray();

    return view('certificates', compact('user', 'userSkills'));

    }
     public function getCertificate($skill){
       
        $user = Auth::user();
        if (!$user) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }
        // $friebdship fetch date from friend_request
     $friendship = FriendRequest::where(function($q) use ($user) {
        $q->where('sender_id', $user->id)
          ->orWhere('receiver_id', $user->id);
    })->where('status', 'accepted')->first();

    if (!$friendship) {
        return redirect()->back()->with('error', 'Friendship record not found.');
    }
    $from = Carbon::parse($friendship->updated_at)->toDateString();
    $to   = Carbon::parse($from)->addMonth()->toDateString();

    $data = [
        'name' => $user->name,
        'lastname' => $user->lastname,
        
        'date' => now()->format('Y-m-d'),
        'skill' => $skill,
        'from' => $from,
        'to' => $to,
        'bg_image' => public_path('images/paper.png') 
    ];


    return view('getCertificate', compact('data'));
    //  $sender = JoinWeb::find($sender_id);
    //     $admin = Admin::first();
    //     if ($admin) {
    //         $admin->notify(new AdminNotification("User {$sender->id} request for a Certificate "));
    //     }
    }
    

public function generate(Request $request)
{
    $today = now()->toDateString();

    
    if ($today < Auth::user()->to) {
        return back()->with('error', 'Certificate will be given after completing 1 month.');
    }

    $user = Auth::user();

    $data = [
        'name'     => $user->name,
        'lastname' => $user->lastname,
        'skill'    => $user->skill,   
        'from'     => $user->from,
        'to'       => $user->to,
        'date'     => now()->format('d-m-Y'),
    ];

    $pdf = Pdf::loadView('certificate_pdf', ['data' => $data]);
    return $pdf->download('certificate.pdf');
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

//     if (!auth()->check()) {
//     return redirect()->route('login')->with('error', 'Please log in first.');
// }
    $users = JoinWeb::where('id', '!=', auth()->id())->get();
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
public function show($id)
{
    $user = \App\Models\JoinWeb::findOrFail($id);
    return view('ibPROFILE', compact('user'));
}

// Inbox Profile

// Inbox Profile
// 
// public function inboxProfile(){
//     $user = Auth::user(); 
//         return view('inboxProfile', compact('user'));
//     }
// friends list icon
// public function navbar()
// {
//     $friends = auth()->user()->friends; // assuming friends() relation exists
//     return view('your_layout', compact('friends'));
// }
public function inboxProfile($id)
{
    $friend = \App\Models\JoinWeb::findOrFail($id);
    $user = Auth::user();

    return view('ibPROFILE', compact('friend', 'user'));
}


}