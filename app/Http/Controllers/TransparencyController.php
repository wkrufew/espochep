<?php

namespace App\Http\Controllers;

use App\Models\Transparency;
use Illuminate\Http\Request;

class TransparencyController extends Controller
{
    public function index()
    {
        $transparency = Transparency::where('status', 2)->get();

        return view('transparencies.index', compact('transparency'));
    }
}
