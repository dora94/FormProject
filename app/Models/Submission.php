<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submissions';

    protected $fillable = [
        'submissionDate',
        'form_id'
    ];

    public function submissions()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
