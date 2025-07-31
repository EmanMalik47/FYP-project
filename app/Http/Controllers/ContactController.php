<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(request $request)
    {
// $request->validate([
//     'firstname'=> 'required|min:3|alpha',
//     'lastname'=> 'required|min:3|alpha',
//     'email'=> 'required|email',
//     'mssage'=> 'required|min:5',
// ]);

        $data = new ContactUs();
        $data->firstname= $request->input('firstname');
         $data->lastname= $request->input('lastname');
          $data->email= $request->input('email');
          $data->message = $request->input('message');
          $data->save();

          ContactUs::create($request->only('firstname', 'lastname', 'email', 'message'));
          return redirect()->back()->with('success', 'Your message has been sent SUCCESSFULLY!');

    }
};
