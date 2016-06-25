<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'title',
        'type',
        'form_id',
        'isRequired',
        'fontfamily',
        'fontcolor',
        'fontstyle',
        'section_id'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Form');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }
}
