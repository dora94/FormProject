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
        $message = $request->input('message');

        Mail::raw($message,  function ($m) use ($emailTo) {
            $m->to($emailTo)->subject('New submission!');
        });
        
        return response()->json(['message' => 'Request completed']);
    }
}
