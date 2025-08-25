<?php

namespace App\Http\Controllers;
use App\Models\JoinWeb;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Session;
use App\Models\FriendRequest;
use App\Models\Certificate;
use App\Models\ExchangeRequest;
use Illuminate\Http\Request;
use App\Notifications\FriendRequestNotification;    
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
     public function showdashboard(){
        $totalUsers = JoinWeb::count();
        $totalQueries = ContactUs::count();
      $activeExchanges   = ExchangeRequest::where('status', 'accepted')->count();
    $rejectedExchanges = ExchangeRequest::where('status', 'rejected')->count();

    return view('admin.dashboard.adminDashboard', compact(
        'totalUsers',
        'totalQueries',
        'activeExchanges',
        'rejectedExchanges'
    ));}

    public function showmanage_user(){
        $users = JoinWeb::latest()->get();
        return view('admin.dashboard.manageuser',compact('users'));

    }
   public function showmanage_skills(){
    $skills = JoinWeb::latest()->get(); 
    return view('admin.dashboard.manageSkills', compact('skills')); 
}

   public function showExchangeRequests()
{
    $requests = FriendRequest::with(['sender', 'receiver'])->get();    
    return view('admin.dashboard.exchangeRequest', compact('requests'));
}

   public function showCertificates()
{
    $certificates = Certificate::with('user')->get();
    return view('admin.dashboard.adminCertificates', compact('certificates'));
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
   
// Approve Query
public function approveQuery($id)
{
    $query = ContactUs::findOrFail($id);
    $query->status = 'Handled';
    $query->save();

    return redirect()->back()->with('success', 'Query approved!');
}

// Dismiss Query
// public function dismissQuery($id)
// {
//     $query = ContactUs::findOrFail($id);
//     $query->status = 'Handled';
//     $query->save();

//     return redirect()->back()->with('success', 'Query dismissed!');
// }



    //query dismiss in query page
    public function dismiss($id){
        $query = ContactUs::findOrFail($id);
        $query->delete();
         return redirect()->back()->with('success', 'Query dismissed successfully.');
    }
//skil dismiss in manage skill page
    public function dismissed($id){
        $query = JoinWeb::findOrFail($id);
        $query->delete();   
         return redirect()->back()->with('success', 'skill dismissed successfully.');
    }
public function respondFriendRequest($id, $action)
{
    $request = FriendRequest::findOrFail($id);

    if (!in_array($action, ['accepted', 'rejected'])) {
        return redirect()->back()->with('error', 'Invalid action.');
    }
        if ($action === 'rejected') {
            $action = 'declined';
        }

    $request->status = $action;
    $request->save();


    Session::flash('notification_' . $request->sender_id, "Your friend request to {$request->receiver->name} was {$action}.");

    return redirect()->back()->with('success', "Friend request has been {$action}.");
}


}
