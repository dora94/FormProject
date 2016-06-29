<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class TranslationController extends Controller
{
    
    public function getTranslationArray(Request $request)
    {
        $locale = $request['data']['locale'];
        App::setLocale($locale);
        $array = Lang::get('form');

        return $array;
    }
}
