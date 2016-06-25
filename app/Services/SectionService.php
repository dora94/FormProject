<?php
/**
 * Created by PhpStorm.
 * User: agage
 * Date: 25-Jun-16
 * Time: 00:07
 */

namespace App\Services;


use App\Models\Section;

class SectionService
{
    public function create($data, $optionId){
        $section = Section::create(['option_id' => $optionId]);

        $questionSrv = new QuestionService();
        foreach ($data['questions'] as $question){
            $questionSrv->createQuestion($question,$section->id,'section_id');
        }
    }
}