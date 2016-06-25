<?php
/**
 * Created by PhpStorm.
 * User: agage
 * Date: 24-Jun-16
 * Time: 22:27
 */

namespace App\Services;


use App\Models\Question;
use App\Models\Option;
use App\Models\Section;

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
            'isRequired' => $isRequired == 'true' ? 1 : 0,
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


    public function getTitles($form_id)
    {
        $titles = [];

        $questions = Question::where('form_id',$form_id)->get();

        foreach($questions as $question)
        {
            array_push($titles,$question->title);

            if($question->type == 5)
            {
                $options = Option::where('question_id',$question->id)->get();

                foreach($options as $option)
                {
                    $sections = Section::where('option_id',$option->id)->get();

                    foreach($sections as $section)
                    {
                        $questions2 = Question::where('section_id',$section->id)->get();

                        foreach($questions2 as $question2)
                        {
                            array_push($titles,$question2->title);
                        }
                    }
                }
            }

        }

        return $titles;
    }
}