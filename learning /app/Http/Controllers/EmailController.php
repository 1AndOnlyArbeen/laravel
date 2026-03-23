<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail = "arbinbabuthapamagar2002@gmail.com";
        $message = "Welcome to vintuna store, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae impedit tempore quisquam accusamus autem quo odit reiciendis, non totam dolore ipsam optio qui cupiditate culpa hic? Nemo magnam velit minus. ";
        $subject = "welocme to the vintuna store ";

        Mail::to($toEmail)->send(new welcomeemail($message, $subject));
    }
}
