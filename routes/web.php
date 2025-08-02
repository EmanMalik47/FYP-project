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

Route::get('/adminDashboard',[adminController::class,'showdashboard'])->name('adminDashboard');
Route::prefix('admin')->group(function () {
    Route::get('/manageuser', [adminController::class, 'showmanage_user'])->name('admin.dashboard.manageuser');
});
// Route::get('/manageuser',[adminController::class,'showmanage_user'])->name('manageuser');
Route::get('/manageSkills',[adminController::class,'showmanage_skills'])->name('manageSkills');
Route::get('/exchangeRequest',[adminController::class,'showexchange_request'])->name('exchangeRequest');
Route::get('/adminCategories',[adminController::class,'showCategories'])->name('adminCategories');
Route::prefix('admin')->group(function () {
    Route::get('/query', [adminController::class, 'showquery'])->name('admin.dashboard.query');
});

Route::get('/welcome',[pgController::class,'showwelcome'])->name('welcome');
Route::get('/services',[pgController::class,'showservices'])->name('services');
Route::get('/trainers',[pgController::class,'showtrainers'])->name('trainers');
Route::get('/certificates',[pgController::class,'showcertificates'])->name('certificates');
Route::get('/joinUs',[pgController::class,'showjoinUs'])->name('joinUs');
Route::get('/profile/{id}', [pgController::class, 'showprofile'])->name('profile.view');
Route::get('/profile', [pgController::class, 'showProfile'])->middleware('auth');
// Route::get('/profile',[pgController::class,'showprofile'])->name('profile');
Route::get('/contact',[pgController::class,'showcontact'])->name('contact');
Route::get('/eman',[pgController::class,'showeman'])->name('eman');
Route::get('/open',[pgController::class,'showopen'])->name('open');

route::post('/store_data',[FormController::class, 'store_data']);
//joinUs
route::post('/store', [JoinController::class, 'store']);

//contactUs route
route::post('/contact',[ContactController::class, 'contact']);


