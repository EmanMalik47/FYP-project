<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinWeb;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Step 1: Just a link to open form
    public function showProfileLink()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('profile', compact('user')); // show profile info
        } else {
            return view('login'); // show login form
        }
    }

    // Step 2: Show login form
    public function showLogin()
    {
        if (!view()->exists('login')) {
            dd('View not found');
        }
        return view('login');
    }

    // Step 3: Handle Login (Normal User)
    public function handleAuth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // First try to login as Admin
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard'); 
        }

        // Then try to login as Normal User
        if (Auth::guard('web')->attempt($credentials)) {
            if (Auth::user()->is_blocked) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Your account is blocked.']);
        }
            return redirect()->route('profile.view');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    // Step 4: Show Join Us form
    public function showJoinForm()
    {
        return view('joinUs');
    }

    // Step 5: Register New User
    public function registerUser(Request $request)
    {
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
            'password' => Hash::make($validated['password']),
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('profile.view');
    }

    // Step 6: Logout
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate(); 
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
