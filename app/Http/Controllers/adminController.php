<?php

namespace App\Http\Controllers;
use App\Models\JoinWeb;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Session;
use App\Models\FriendRequest;
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

     public function showcertificates(){
         $requests = FriendRequest::with(['sender', 'receiver'])->get();
    return view('admin.dashboard.certificates', compact('requests'));
        

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

    // Optionally, you could notify the user here (via session, notification, etc.)

    Session::flash('notification_' . $request->sender_id, "Your friend request to {$request->receiver->name} was {$action}.");

    return redirect()->back()->with('success', "Friend request has been {$action}.");
}



// Admin reject request function
public function rejectByAdmin($id)
{
    $friendRequest = FriendRequest::with(['sender', 'receiver'])->findOrFail($id);

    // Request status update
    $friendRequest->status = 'declined';
    $friendRequest->save();

    $adminName = Auth::guard('admin')->user()->name ?? 'Admin';

    // Sender ko notification
    $friendRequest->sender->notify(
        new FriendRequestNotification(
            "Your request sent to {$friendRequest->receiver->name} has been rejected by {$adminName}.",
            'rejected',
            $friendRequest->receiver_id
        )
    );

    // Receiver ko notification
    $friendRequest->receiver->notify(
        new FriendRequestNotification(
            "The request you received from {$friendRequest->sender->name} has been rejected by {$adminName}.",
            'rejected',
            $friendRequest->sender_id
        )
    );

    return redirect()->back()->with('success', 'Friend request rejected and notifications sent.');
}


}
