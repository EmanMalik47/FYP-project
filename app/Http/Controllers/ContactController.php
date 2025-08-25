<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Notifications\AdminNotification;

class ContactController extends Controller
{
      public function index()
    {
        return view('contact'); 
    }
    public function contact(Request $request)
{
      $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email',
            'message'   => 'required|string',
        ]);

        // save query
        $query = new ContactUs();
        $query->firstname = $request->firstname;
        $query->lastname  = $request->lastname;
        $query->email     = $request->email;
        $query->message   = $request->message;
        $query->status    = 'Pending'; 
        $query->save();

    // Send notification to admin
        $admin = Admin::first();
        if ($admin) {
            $fullName = $request->firstname . ' ' . $request->lastname;
            $admin->notify(new AdminNotification("New contact message from {$fullName} ({$request->message})"));
        }
    return back()->with('success', 'Your message has been sent!');
}




};
