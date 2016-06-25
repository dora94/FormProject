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

    public function showSubmission($url){
        $form = Form::where('url',$url)->first();
        $jsonReturnArray = [
            'title' => $form->title,
            'description' => $form->description,
            'isQuiz' => $form->isQuiz == 0 ? false : true,
            'url' => $form->url
        ];
        $questions = $form->questions;
        $questionsArray = [];
        foreach($questions as $question){
            $currentQuestionArray = [
                'text' => $question->title,
                'type' => $question->type,
                'isRequired' => $question->isRequired == 0 ? false : true,
                'fontFamily' => $question->fontfamily,
                'fontStyle' => $question->fontstyle,
                'textColor' => $question->fontcolor
            ];
            $options = $question->options;
            $optionsArray =[];
            foreach ($options as $option){
                $currentOptionArray = [
                    'optionText' => $option->title
                ];
                $section = $option->section;
                if(isset($section)){
                    $questions2 = $section->questions;
                    $questionsArray2 = [];
                    foreach ($questions2 as $question2){
                        $currentQuestionArray2 = [
                            'text' => $question2->title,
                            'type' => $question2->type,
                            'isRequired' => $question2->isRequired == 0 ? false : true,
                            'fontFamily' => $question2->fontfamily,
                            'fontStyle' => $question2->fontstyle,
                            'textColor' => $question2->fontcolor,
                        ];
                        $options2 = $question2->options;
                        $optionsArray2 = [];
                        foreach ($options2 as $option2){
                            $currentOptionArray2 = [
                                'optionText' => $option2->title
                            ];
                            $optionsArray2[] = $currentOptionArray2;
                        }
                        $currentQuestionArray2['options'] = $optionsArray2;
                        $questionsArray2[] = $currentQuestionArray2;
                    }
                    $currentOptionArray['section'] = ['questions' => $questionsArray2];
                }
                $optionsArray[] = $currentOptionArray;
            }
            $currentQuestionArray['options'] = $optionsArray;
            $questionsArray[] = $currentQuestionArray;
        }
        $jsonReturnArray['questions'] = $questionsArray;
        return response()->json($jsonReturnArray);
    }
}
