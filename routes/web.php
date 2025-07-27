<?php

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

Route::get('/welcome',[pgController::class,'showwelcome'])->name('welcome');
Route::get('/services',[pgController::class,'showservices'])->name('services');
Route::get('/trainers',[pgController::class,'showtrainers'])->name('trainers');
Route::get('/certificates',[pgController::class,'showcertificates'])->name('certificates');
Route::get('/joinUs',[pgController::class,'showjoinUs'])->name('joinUs');
Route::get('/profile',[pgController::class,'showprofile'])->name('profile');
Route::get('/contact',[pgController::class,'showcontact'])->name('contact');
Route::get('/eman',[pgController::class,'showeman'])->name('eman');
Route::get('/open',[pgController::class,'showopen'])->name('open');


