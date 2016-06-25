<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreate(){
        return view('form.formGenerator');
    }

    public function store(Request $request)
    {
        $recieved = $request['data'];
        $user =  $request->user();
        $url = uniqid();
        $form = [
            'title' => $recieved['title'],
            'description' => $recieved['description'],
            'user_id' => Auth::user()->id,
           'isQuiz' => $recieved['isQuiz'],
            'url' => $url
        ];
        $form = Form::create($form);
        $formId = $form->id;
        $questionsLevel1 = $recieved['questions'];
        
        $questionSrv = new QuestionService();
        foreach ($questionsLevel1 as $question){
            $questionSrv->createQuestion($question,$formId, 'form_id');
        }

    }
}
