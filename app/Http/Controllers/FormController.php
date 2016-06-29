<?php

namespace App\Http\Controllers;

use App\Models\Submission;
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

    public function getFile($name)
    {
        return response()->download(base_path() . '/public/uploads/' .$name);
    }

    public function storeFile(Request $request)
    {
        $url = Session::pull('url', 'default');
        if(isset($request['fileUpload']))
        {
            $fileExt = "." . $request->file('fileUpload')->getClientOriginalExtension();
            $request->file('fileUpload')->move(base_path() . '/public/uploads/', $url . $fileExt);

            $form = Form::where('url', $url)->first();

            $form->file_extension = $fileExt;
            $form->save();
        }
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
           'isQuiz' => $recieved['isQuiz'] == 'true' ? 1 : 0,
            'url' => $url,
            'maxSubmission' => $recieved['maxsubmissions']
        ];
        $form = Form::create($form);
        $formId = $form->id;
        $questionsLevel1 = $recieved['questions'];
        
        $questionSrv = new QuestionService();
        foreach ($questionsLevel1 as $question){
            $questionSrv->createQuestion($question,$formId, 'form_id');
        }

    }

    public function getFormInformation()
    {
        $user = Auth::user()->id;

        $forms = Form::where('user_id',$user)->get();
        $infoArray = [];

        foreach($forms as $form)
        {
            array_push($infoArray,array('title'=>$form->title, 'description'=>$form->description, 'url'=>$form->url));
        }
//        return $user;
        return view('form.formList',['forms'=>$infoArray]);
    }

    public function showSubmission($url){
        $form = Form::where('url',$url)->first();

        $count = 0;

        foreach(Submission::where('form_id',$form->id)->get() as $submission)
        {
            $count = $count + 1;
        }

        if($count >= $form->maxSubmission)
            return view('base.formClosed');

        $jsonReturnArray = [
            'title' => $form->title,
            'description' => $form->description,
            'isQuiz' => $form->isQuiz == 0 ? false : true,
            'url' => $form->url,
            'file_extension' => $form->file_extension
        ];
        $questions = $form->questions;
        $questionsArray = [];
        foreach($questions as $question){
            $currentQuestionArray = [
                'text' => $question->title,
                'type' => $question->type,
                'id' => $question->id,
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
                            'id'=> $question2->id,
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

        return view('form.formSubmission',['form'=>$jsonReturnArray]);
//        return response()->json($jsonReturnArray);
    }

    public function removeForm($url)
    {
        $form = Form::where('url',$url)->first();
        $form->delete();

        return redirect('/forms');
    }
}
