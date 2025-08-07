<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pgController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\profile_controller;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\FriendRequestController;




Route::get('/auth-form', [AuthController::class, 'showAuthForm'])->name('auth-form');
Route::post('/handle-auth', [AuthController::class, 'handleAuth'])->name('handle.auth');
Route::get('/join-us', [AuthController::class, 'showJoinForm'])->name('joinUs');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register.user');
Route::get('/profile-page/{id}', [AuthController::class, 'showProfile'])->name('profile');





// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
});


//admin panel
Route::get('/adminDashboard',[adminController::class,'showdashboard'])->name('admin.dashboard.adminDashboard');
Route::prefix('admin')->group(function () {
    Route::get('/manageuser', [adminController::class, 'showmanage_user'])->name('admin.dashboard.manageuser');
});
Route::delete('/admin/users/delete/{id}', [adminController::class, 'destroy'])->name('admin.deleteUser');

// Route::get('/manageuser',[adminController::class,'showmanage_user'])->name('manageuser');
Route::get('/manageSkills',[adminController::class,'showmanage_skills'])->name('admin.dashboard.manageSkills');
Route::get('/admin/exchangeRequest',[adminController::class,'showExchangeRequests'])->name('admin.dashboard.exchangeRequest');
Route::get('/adminCertificates',[adminController::class,'showCertificates'])->name('admin.dashboard.adminCertificates');
Route::prefix('admin')->group(function () {
    Route::get('/query', [adminController::class, 'showquery'])->name('admin.dashboard.query');
});

Route::prefix('admin')->group(function () {
    Route::get('/manageskills', [adminController::class, 'showmanage_skills'])->name('admin.dashboard.manageSkills');
});



Route::post('/admin/query/dismiss/{id}', [adminController::class, 'dismiss'])->name('admin.query.dismiss');


//user panel
Route::get('/welcome',[pgController::class,'showwelcome'])->name('welcome');
Route::get('/services',[pgController::class,'showservices'])->name('services');
Route::get('/trainers',[pgController::class,'showtrainers'])->name('trainers');
Route::get('/certificates',[pgController::class,'showcertificates'])->name('certificates')->name('certificates')->middleware('auth');
Route::get('/getCertificate',[pgController::class,'getCertificate'])->name('getCertificate')->name('certificates')->middleware('auth');

Route::post('/generate-certificate', [pgController::class, 'generate'])->name('certificate.generate')->middleware('auth');
Route::get('/joinUs',[pgController::class,'showjoinUs'])->name('joinUs');
Route::get('/users', [pgController::class, 'showAllUsers'])->name('users.list');



Route::get('/contact',[pgController::class,'showcontact'])->name('contact');
Route::get('/eman',[pgController::class,'showeman'])->name('eman');
Route::get('/open',[pgController::class,'showopen'])->name('open');

route::post('/store_data',[FormController::class, 'store_data']);
//joinUs
route::post('/store', [JoinController::class, 'store']);

//contactUs route
route::post('/contact',[ContactController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'handleAuth'])->name('handle.auth');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin/dashboard', [adminController::class,'showdashboard'])->name('admin.dashboard');

// Route::get('/adminDashboard',[adminController::class,'showdashboard'])->name('admin.dashboard.adminDashboard');


 Route::get('/profile-page/{id}', [AuthController::class, 'showProfile'])->name('profile.detail'); 
//admin login form


Route::post('/logout', function () {
    session()->forget('is_admin'); // or use Auth::logout() if you're using Laravel Auth
    return redirect()->route('profile.view'); // or any route you want after logout
})->name('logout');




//search route
Route::get('/searchSkill', [SkillController::class, 'search'])->name('searchSkill');
Route::get('/search-profile/{id}', [SkillController::class, 'searchview'])->name('search.profile');


Route::post('/admin/query/dismissed/{id}', [adminController::class, 'dismissed'])->name('admin.query.dismissed');
Route::post('/admin/respond-request/{id}/{action}', [AdminController::class, 'respondFriendRequest'])->name('admin.friend.respond');
   

Route::get('/profile', [pgController::class, 'showProfile'])->name('profile.view')->middleware('auth');

//sending frien request:-
Route::middleware('auth')->group(function () {
    Route::post('/send-request/{receiver_id}', [FriendRequestController::class, 'sendRequest'])->name('friend.send');
    Route::get('/friend-requests', [FriendRequestController::class, 'viewRequests'])->name('friend.requests');
    Route::post('/respond-request/{id}/{action}', [FriendRequestController::class, 'respondRequest'])->name('friend.respond');
});


Route::get('/user-profile/{id}', [pgController::class, 'showUserProfile'])->name('user.profile.view');



