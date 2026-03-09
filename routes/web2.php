<?php

use Illuminate\Support\Facades\Route;

Route::get('/another', function () {
    return view('another');
});

Route::get('/welcometo', function(){
    return view ('welcometo');
});

Route::get('/user', function(){

$anotherDetails = "hahahahahah this is just the test";
    $details = "Arbeen This is your data from the route,Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus pariatur consequuntur aliquid ullam? Iusto tempora sapiente, ea itaque odio at nobis recusandae rerum, voluptates odit ut esse. Unde, dolore! Dolor. $anotherDetails !";
    return view ('user',['user'=> $details , 'city'=>  '<script> alert("K XA BABU? HAHA "); </script>', ]);
});
