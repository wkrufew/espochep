<?php

namespace App\Http\Controllers;

use App\Models\Surrender;
use Illuminate\Http\Request;

class SurrenderController extends Controller
{
    public function index()
    {
        $surrender = Surrender::where('status', 2)->get();

        return view('rendiciones.index', compact('surrender'));
    }
}
