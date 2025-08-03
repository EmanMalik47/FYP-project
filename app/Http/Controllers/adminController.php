<?php

namespace App\Http\Controllers;
use App\Models\JoinWeb;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function showdashboard(){
        return view('admin\dashboard\adminDashboard');

    }
    public function showmanage_user(){
        $users = JoinWeb::latest()->get();
        return view('admin.dashboard.manageuser',compact('users'));

    }
    public function showmanage_skills(){
        return view('admin\dashboard\manageSkills');

    }
     public function showexchange_request(){
        return view('admin\dashboard\exchangeRequest');

    }
     public function showcategories(){
        return view('admin\dashboard\adminCategories');

    }
     public function showquery(){
        $queries = ContactUs::latest()->get();
        return view('admin.dashboard.query',compact('queries'));

    }
    // delete user in manageuser page
    public function destroy($id) {
    $user = JoinWeb::findOrFail($id);
    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully');
    }

    //query dismiss in query page
    public function dismiss($id){
        $query = ContactUs::findOrFail($id);
        $query->delete();
        // $query->status = 'Dismissed';
        // $query->save();
         return redirect()->back()->with('success', 'Query dismissed successfully.');
    }

    //  public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/admin/login'); // ya jo bhi login page ka route hai
    // }

}
