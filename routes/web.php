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

Route::get('/profile', [AuthController::class, 'showProfileLink'])->name('profile');

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
// Route::get('/first',function(){
//     return view('first');
// });
// Route::view('/about','about');
// Route::get('/about', function () {
//     return view('about');
// });

//admin panel
Route::get('/adminDashboard',[adminController::class,'showdashboard'])->name('admin.dashboard.adminDashboard');
Route::prefix('admin')->group(function () {
    Route::get('/manageuser', [adminController::class, 'showmanage_user'])->name('admin.dashboard.manageuser');
});
Route::delete('/admin/users/delete/{id}', [adminController::class, 'destroy'])->name('admin.deleteUser');

// Route::get('/manageuser',[adminController::class,'showmanage_user'])->name('manageuser');
Route::get('/manageSkills',[adminController::class,'showmanage_skills'])->name('admin.dashboard.manageSkills');
Route::get('/exchangeRequest',[adminController::class,'showexchange_request'])->name('admin.dashboard.exchangeRequest');
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
Route::get('/certificates',[pgController::class,'showcertificates'])->name('certificates');
Route::get('/joinUs',[pgController::class,'showjoinUs'])->name('joinUs');

// Route::get('/profile', [pgController::class, 'showProfile'])->middleware('auth')->name('profile.view');
// Route::get('/profile',[pgController::class,'showprofile'])->name('profile');
Route::get('/contact',[pgController::class,'showcontact'])->name('contact');
Route::get('/eman',[pgController::class,'showeman'])->name('eman');
Route::get('/open',[pgController::class,'showopen'])->name('open');

route::post('/store_data',[FormController::class, 'store_data']);
//joinUs
route::post('/store', [JoinController::class, 'store']);

//contactUs route
route::post('/contact',[ContactController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile-page/{id}', [AuthController::class, 'showProfile'])->name('profile.detail'); // clear
Route::get('/profile', [AuthController::class, 'showProfileLink'])->name('profile'); // general

Route::get('/profile', [AuthController::class, 'showProfileLink'])->name('profile.view'); // for showing profile or login form

//search route
Route::get('/searchSkill', [SkillController::class, 'search'])->name('searchSkill');


Route::post('/admin/query/dismissed/{id}', [adminController::class, 'dismissed'])->name('admin.query.dismissed');
   