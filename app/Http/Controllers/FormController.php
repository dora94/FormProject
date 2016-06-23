<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function showCreate(){
        return view('forms.baseForm');
    }

    public function store(Request $request)
    {
        $recieved = $request['data'];
        $user =  $request->user();
        $url = uniqid();
        $form = [
            'title' => $recieved['title'],
            'description' => $recieved['description'],
            'userId' => Auth::user()->id,
//            'isQuiz' => $recieved['isQuiz'],
            'url' => $url
        ];
        Form::create($form);

    }
}
