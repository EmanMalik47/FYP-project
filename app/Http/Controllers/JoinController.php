<?php

namespace App\Http\Controllers;

use App\Models\JoinWeb;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Validator;


class JoinController extends Controller
{
  
     //this method will store values in  join_us page db
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:join_webs',
        'phone' => 'required',
        'password' => 'required',
        'sellist1' => 'required',
        'sellist2' => 'required',
        'facilities' => 'required',
        'about' => 'required',
        'pdf' => 'nullable|mimes:pdf,doc,docx|max:2048',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = new JoinWeb;

    // ✅ HANDLE IMAGE UPLOAD
    if ($request->hasFile('profile')) {
        $file = $request->file('profile');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $data->profile = $filename;
    } else {
        $data->profile = null;
    }

    // ✅ HANDLE PDF UPLOAD
    if ($request->hasFile('pdf')) {
        $pdfFile = $request->file('pdf');
        $pdfFilename = time() . '_' . $pdfFile->getClientOriginalName();
        $pdfFile->move(public_path('pdfs'), $pdfFilename);
        $data->pdf = 'pdfs/' . $pdfFilename;
    }

    // ✅ Store other fields
    $data->name = $validated['name'];
    $data->lastname = $validated['lastname'];
    $data->email = $validated['email'];
    $data->phone = $validated['phone'];
    $data->password = bcrypt($validated['password']);
    $data->sellist1 = $validated['sellist1'];
    $data->sellist2 = $validated['sellist2'];
    $data->facilities = $validated['facilities'];
    $data->about = $validated['about'];

    $data->save();  // ✅ Now save everything

    Auth::login($data);  // Optional: if you want auto-login
    return redirect()->route('profile.view');
}
}


