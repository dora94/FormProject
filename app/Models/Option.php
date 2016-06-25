<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';

    protected $fillable = [
        'title',
        'question_id',
        'isChecked'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function section()
    {
        return $this->hasOne('App\Models\Section');
    }
}
