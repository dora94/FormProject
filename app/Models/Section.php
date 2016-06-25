<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'option_id'
    ];

    public function option()
    {
        return $this->belongsTo('App\Models\Option');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
