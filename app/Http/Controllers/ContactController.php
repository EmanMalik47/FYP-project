<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Notifications\AdminNotification;

class ContactController extends Controller
{
    public function contact(Request $request)
{
    ContactUs::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'message' => $request->message
    ]);

    // Send notification to admin
        $admin = Admin::first();
        if ($admin) {
            $fullName = $request->firstname . ' ' . $request->lastname;
            $admin->notify(new AdminNotification("New contact message from {$fullName} ({$request->message})"));
        }
    return back()->with('success', 'Your message has been sent!');
}




};
