<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    public function storeFile(Request $request)
    {
        $fileExt ="." . $request->file('fileUpload')->getClientOriginalExtension();
        $request->file('fileUpload')->move(base_path() . '/public/uploads', Session::pull('url', 'default') . $fileExt);

    }
    
    public function store(Request $request)
    {
        $recieved = $request['data'];
        $user =  $request->user();
        $url = uniqid();
        Session::put("url",$url);
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
