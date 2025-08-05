<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinWeb;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Step 1: Just a link to open form
    public function showProfileLink() {
      if (Auth::check()) {
        $user = Auth::user();
        return view('profile', compact('user')); // show profile info
    } else {
        return view('login'); // show login form
    }
}

    // Step 2: Show login/register form
    public function showlogin() {
                if (!view()->exists('login')) {
    dd('View not found');}
    return view('login');

    }

    // Step 3: Handle Login
    public function handleAuth(Request $request) {
        $credentials = $request->only('email', 'password');
//admin block hadcoded entery:-
  if ($credentials['email'] === 'adminET@gmail.com' && $credentials['password'] === 'admin147169') {
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard'); // Define this route
        }
        //simp/e user entery:-
        if (Auth::attempt($credentials)) {
           $user = Auth::user();
        return redirect()->route('profile.view', ['id' => $user->id]);

        }       
      return back()->withErrors(['email' => 'Invalid Credentials']);
    }


    // Step 4: Show Join Us form
    public function showJoinForm() {
        return view('joinUs');
    }

    // Step 5: Register New User
    public function registerUser(Request $request) {
     // 1. Validate the form input
     
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create new user
    $user = JoinWeb::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);


    Auth::login($user); 

    // Redirect to profile page
    return redirect()->route('profile.view');

}

public function logout(Request $request) {
     Auth::logout(); // logout the user
    $request->session()->invalidate(); // invalidate session
    $request->session()->regenerateToken(); // prevent CSRF issues

    return redirect()->route('login'); // or 'joinus'
}
}