<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Form;

class FormController extends Controller
{
    public function store(Request $request)
    {
        return $request['_token'];

    }
}
