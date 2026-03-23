<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show the form
    public function showregisterUser()
    {
        
        return view('register');
    }

    public function login()
    {
     
        return view('login');
    }





    // For WEB (browser form) - redirects
    public function registerUser(Request $req)
    {
        $validation = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email|lowercase',
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
                'email'            => 'required|email|unique:users,email|lowercase',
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


    /* Making Login User 
     i have to see if the user enter the email or not ?
     then i have to check if the email exist in the database of not ?
     then i have to see if the user enter the password or not ?
     then i have to has the password the user given , 
     then i have to check if the hased password mathed the password hased in the database or not
     then i have to redirect the user to the welcome page if all good 
     if not i have to send the user a proper error message    
    
    
    */

    public function loginUser(Request $req)
    {

        $validation = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $validation['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found'])->withInput();
        }

        if (!Hash::check($validation['password'], $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password'])->withInput();
        }

        Auth::login($user);
          $req->session()->regenerate(); // this will help me to regenerate the session token after login  
        return redirect('/welcome')->with('success', 'Login successful! Welcome back, ' . $user->name);
    }


    /* making logout user */

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();     
        $req->session()->regenerateToken(); 
        return redirect('/login')->with('success', 'You have been logged out successfully!');
    }


    
    // for api testing 

    public function loginUserApi(Request $req)
    {
        try {
            $validation = $req->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            $user = User::where('email', $validation['email'])->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email not found'
                ], 404);
            }

            if (!Hash::check($validation['password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Incorrect password'
                ], 401);
            }

            Auth::login($user);
            $req->session()->regenerate(); // this will help me to regenerate the session token after login 

            return response()->json([
                'success' => true,
                'message' => 'Login successful! Welcome back, ' . $user->name,
                'user'    => $user
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


    // for logout api

    public function logoutApi(Request $req){
        try {
            
            return response()->json([
                'success' => true,
                'message' => 'You have been logged out successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error'   => $e->getMessage()
            ], 500);
        }


    }


    // fallback function for web response

    public function fallback(Request $req){
        if($req->expectsJson()){
            return response()->json([
                "success" => false,
                "message" => "The requested resource was not found on this server."
            ], 404);
        }
        return view('fallback');
    }

    //fallback function for api response 
    // public function fallbackApi(){
    //     return response()->json([
    //         "success" => false,
    //         "message" => "The requested resource was not found on this server."
    //     ]);
    // }
}
