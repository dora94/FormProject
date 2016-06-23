<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $emailTo = $request->input('emailTo');

        Mail::send('form.basicForm', [], function ($m) use ($emailTo) {
            $m->to($emailTo)->subject('Your Reminder!');
        });
        
        return response()->json(['message' => 'Request completed']);
    }
}
