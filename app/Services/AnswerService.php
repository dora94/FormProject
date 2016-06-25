<?php

namespace App\Services;


use App\Models\Answer;
use App\Models\Submission;

class AnswerService
{
    public function createAnswer($data, $refId, $parent)
    {
        $question_id = $data['question_id'];
        $answerValue = $data['answerValue'];

        $answer = Answer::create([
            'question_id' => $question_id,
            'answerValue' => $answerValue,
            $parent => $refId
        ]);

    }

    public function getAnswers($submission)
    {
        return Answer::where('submission_id',$submission)->get();
    }
}