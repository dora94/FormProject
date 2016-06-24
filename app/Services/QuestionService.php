<?php
/**
 * Created by PhpStorm.
 * User: agage
 * Date: 24-Jun-16
 * Time: 22:27
 */

namespace App\Services;


use App\Models\Question;

class QuestionService
{
    public function createQuestion($data, $formId){
        $title = $data['text'];
        $type = $data['type'];
        $isRequired = $data['isRequired'];
        $fontFamily = $data['fontFamily'];
        $fontStyle = $data['fontStyle'];
        $fontColor = $data['textColor'];
        Question::create([
            'title' => 
        ])
        
    }
}