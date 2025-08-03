<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;

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

    return back()->with('success', 'Your message has been sent!');
}




};
