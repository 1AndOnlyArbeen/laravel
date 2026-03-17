<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/register', [UserController::class, 'registerUserApi']); 
Route::post('/loginUserApi', [UserController::class, 'loginUserApi'])->name('loginUserApi');
Route::post('/logoutApi', [UserController::class, 'logoutApi'])->name('logoutApi');