<?php

use App\Http\Controllers\fileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController2;


Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/main', function () {
    return view('main');
})->name('main');



Route::get('/fileupload', function () {
    return view('fileupload');
})->name('fileupload');

    






// register router
Route::get('/register', [UserController::class, 'showregisterUser'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('registerUser');

// login router
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/login', [UserController::class, 'login'])->name('login');

// logout router

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::resource('users', UserController2::class);


//file uplodading 

Route::resource('fileupload', fileUploadController::class)->middleware('auth');




// for fallback 
Route::fallback([UserController::class,'fallback'])->name('fallback');