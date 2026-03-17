<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'showregisterUser'])->name('register');

Route::post('/register', [UserController::class, 'registerUser'])->name('registerUser');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');





