<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Idioma extends Controller
{
    public function __invoke()
    {
        $lang = request()->lang;
        session()->put('lang', $lang);
        return back();
    }
}
