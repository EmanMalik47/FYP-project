<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\JoinWeb;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // $friebdship fetch date from friends
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
    $data = [
        'name'     => $request->name,
        'lastname' => $request->lastname,
        'skill'    => $request->skill,   
        'from'     => $request->from,
        'to'       => $request->to,
        'date'     => $request->date,
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
    $users = JoinWeb::where('id', '!=', Auth::id())->get();
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