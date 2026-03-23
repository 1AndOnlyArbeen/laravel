<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
    //      $value = session ()->all();

    // echo "<pre>";
    // print_r($value);
    
    // echo "</pre>";


    $name = session('name');
    $age = session ('age');
    $city = session ('city');
    $course = session ('course');

    echo "$name |$age |$city |$course";

    }

    public function storeSession(){
        session(["name" => "arbeen Shrestha", "age"=> 23, "city"=> "Kathmandu", "course"=> "Backend Enginner"]);
     

    }

    public function deleteSession(){
        session()->forget('name');

    }
    
}
