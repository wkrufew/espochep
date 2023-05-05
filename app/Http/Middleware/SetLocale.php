<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $lang = 'es'; // default

        if (request('lang')) {
            $lang = request('lang');
            session()->put('lang', $lang);
        } elseif (session('lang')) {
            $lang = session('lang');
        }
        app()->setLocale($lang);

        return $next($request); 
    } 
}

/* $lang = 'en';
        if (!session()->exists('lang')) {
            //$lang = substr(request()->server('HTTP_ACCEPT_LANGUAGE'), 0, 2); //IDIOMA DEL NAVEGADOR
            //session()->put('lang', $lang);
            session()->put('lang', 'es');
        }
        App::setlocale(session('lang')); */
        //$lang = 'es'; // default

        /* if (!session()->exists('lang')) {
            $lang = substr(request()->server('HTTP_ACCEPT_LANGUAGE'), 0, 2); //IDIOMA DEL NAVEGADOR
            session()->put('lang', $lang);

        } elseif (request('lang')) {
            $lang = request('lang');
            session()->put('lang', $lang);
        } elseif (session('lang')) {
            $lang = session('lang');
        } */