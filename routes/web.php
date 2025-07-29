<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pgController;
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
Route::get('/manageuser',[adminController::class,'showmanage_user'])->name('manageuser');
Route::get('/manageSkills',[adminController::class,'showmanage_skills'])->name('manageSkills');
Route::get('/exchangeRequest',[adminController::class,'showexchange_request'])->name('exchangeRequest');
Route::get('/adminCategories',[adminController::class,'showCategories'])->name('adminCategories');
Route::get('/reports',[adminController::class,'showreports'])->name('reports');

Route::get('/welcome',[pgController::class,'showwelcome'])->name('welcome');
Route::get('/services',[pgController::class,'showservices'])->name('services');
Route::get('/trainers',[pgController::class,'showtrainers'])->name('trainers');
Route::get('/certificates',[pgController::class,'showcertificates'])->name('certificates');
Route::get('/joinUs',[pgController::class,'showjoinUs'])->name('joinUs');
Route::get('/profile',[pgController::class,'showprofile'])->name('profile');
Route::get('/contact',[pgController::class,'showcontact'])->name('contact');
Route::get('/eman',[pgController::class,'showeman'])->name('eman');
Route::get('/open',[pgController::class,'showopen'])->name('open');

route::post('/store_data',[App\Http\Controllers\FormController::class, 'store_data']);


