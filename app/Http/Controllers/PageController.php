<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class pageController extends Controller
{
    public function showHome(){
        return view ('homepage');
    }


    public function showUsers(){
        return view ('users');
    }



}
