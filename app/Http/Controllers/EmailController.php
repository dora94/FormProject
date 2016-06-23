<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {

        Mail::send('form.basicForm', [], function ($m){
            $m->to('husarudora@yahoo.com')->subject('Your Reminder!');
        });

        return response()->json(['message' => 'Request completed']);
    }
}
