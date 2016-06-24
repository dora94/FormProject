<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';

    protected $fillable = [
        'title',
        'description',
        'password',
        'user_id',
        'isQuiz',
        'isClosed',
        'maxSubmissions',
        'url'
    ];
}
