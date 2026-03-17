<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show the form
    public function showregisterUser()
    {
        return view('register');
    }

   


    
    // For WEB (browser form) - redirects
    public function registerUser(Request $req)
    {
        $validation = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
        ]);

        $user = User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => Hash::make($validation['password']),
            'phone' => $validation['phone'],
            'address' => $validation['address'],
            'gender' => $validation['gender'],
            'date_of_birth' => $validation['date_of_birth'],
        ]);

        return redirect('/')->with('success', 'Registration successful! Welcome ' . $user->name);
    }

    // For API (Postman) - returns JSON
    public function registerUserApi(Request $req)
    {
        try {
            $validation = $req->validate([
                'name'             => 'required',
                'email'            => 'required|email|unique:users,email',
                'password'         => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'phone'            => 'required|numeric|digits:10',
                'address'          => 'required',
                'gender'           => 'in:male,female',
                'date_of_birth'    => 'date',
            ]);

            $user = User::create([
                'name'          => $validation['name'],
                'email'         => $validation['email'],
                'password'      => Hash::make($validation['password']),
                'phone'         => $validation['phone'],
                'address'       => $validation['address'],
                'gender'        => $validation['gender'],
                'date_of_birth' => $validation['date_of_birth'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User registered successfully!',
                'user'    => $user
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Any other error (DB down, server error, etc.)
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
