<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Services\AnswerService;
use App\Services\QuestionService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Submission;
use File;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeSubmission(Request $request)
    {
        $received = $request['data'];
        $url = $received['url'];
        $answers = $received['answers'];

        $formId = Form::where('url',$url)->first();
        $submission = [
                        'submissionDate' => Carbon::now(),
                        'form_id' => $formId->id
                        ];

        $submission = Submission::create($submission);

        $answerService = new AnswerService();

        foreach($answers as $answer){
            $answerService->createAnswer($answer, $submission->id, 'submission_id');
        }

    }

    public function getSubmissions($url)
    {
        $answerService = new AnswerService();
        $questionService = new QuestionService();

        $form_id = Form::where('url',$url)->first()->id;

        $questionTitles = $questionService->getTitles($form_id);

        $submissions = Submission::where('form_id',$form_id)->get();
        $submissionArray = [];

        foreach($submissions as $submission)
        {
            $answers = $answerService->getAnswers($submission->id);

            array_push($submissionArray,array('submission_date' => $submission->submissionDate, 'answers' =>$answers));
        }

        return view('form.formAnswers',['url'=>$url,'submissions'=>$submissionArray,'questions'=>$questionTitles]);
    }

    public function getSubmissionsFile($url)
    {
        $fileName = base_path() . '/public/submissions/' . $url . ".csv";

        $contents = '';

        $answerService = new AnswerService();
        $questionService = new QuestionService();

        $form_id = Form::where('url',$url)->first()->id;

        $questionTitles = $questionService->getTitles($form_id);

        foreach($questionTitles as $title)
        {
            $contents = $contents . $title .";";
        }

        $contents = $contents . 'Submitted_Date' .";\n";

        $submissions = Submission::where('form_id',$form_id)->get();

        foreach($submissions as $submission)
        {
            $answers = $answerService->getAnswers($submission->id);
            foreach($answers as $answer)
            {
                $contents = $contents . $answer->answerValue .";";
            }
            $contents = $contents . $submission->submission_date . ";\n";
        }

        File::put($fileName,$contents);
        
        return response()->download($fileName);
    }
}
