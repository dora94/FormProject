<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'answerValue',
        'question_id',
        'submission_id'
    ];
}
