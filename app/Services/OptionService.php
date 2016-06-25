<?php
/**
 * Created by PhpStorm.
 * User: agage
 * Date: 24-Jun-16
 * Time: 23:51
 */

namespace App\Services;


use App\Models\Option;

class OptionService
{
    public function create($data, $questionId)
    {
        $title = $data['optionText'];
        $checked =$data['isChecked'];
        $option = Option::create([
            'title' => $title,
            'question_id' => $questionId,
            'isChecked' => $checked == 'true' ? 1 : 0
        ]);
        if (isset($data['section'])) {
            $sectionSrv = new SectionService();
            $sectionSrv->create($data['section'], $option->id);
        }
    }
}