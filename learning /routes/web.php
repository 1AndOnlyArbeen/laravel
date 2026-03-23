<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\fileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController2;
use App\Http\Middleware\ValidUser;
use App\Http\Controllers\SessionController;


Route::get('/', function () {
   
    return view('login');
});

Route::get('/welcome', function () {
    
    return view('welcome');
})->middleware('auth',ValidUser::class );


Route::get('/main', function () {
    return view('main');
})->name('main');



Route::get('/fileupload', function () {
   
    return view('fileupload');
})->name('fileupload');


Route::get('/session', [SessionController::class, 'index']);
Route::get('/store-session', [SessionController::class, 'storeSession']);
Route::get('/delete-session', [SessionController::class, 'deleteSession']);







// register router
Route::get('/register', [UserController::class, 'showregisterUser'])
    ->name('register')
    ->middleware("isUserValid", "guest");

Route::post('/register', [UserController::class, 'registerUser'])
    ->name('registerUser');

// login router
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/login', [UserController::class, 'login'])->name('login')-> middleware("guest");

// logout router

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::resource('users', UserController2::class);


//file uplodading 

Route::resource('fileupload', fileUploadController::class)->middleware('auth');




// for fallback 
Route::fallback([UserController::class, 'fallback'])->name('fallback');


Route::get('send-email',[EmailController::class, 'sendEmail']);
