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
    public function createQuestion($data, $refId, $parent)
    {
        $title = $data['text'];
        $type = $data['type'];
        $isRequired = $data['isRequired'];
        $fontFamily = $data['fontFamily'];
        $fontStyle = $data['fontStyle'];
        $fontColor = $data['textColor'];
        $question = Question::create([
            'title' => $title,
            'type' => $type,
            'isRequired' => $isRequired,
            'fontfamily' => $fontFamily,
            'fontcolor' => $fontColor,
            'fontstyle' => $fontStyle,
            $parent => $refId
        ]);

        $optionSrv = new OptionService();
        if (isset($data['options'])) {
            foreach ($data['options'] as $option) {
                $optionSrv->create($option, $question->id);
            }
        }

    }
}