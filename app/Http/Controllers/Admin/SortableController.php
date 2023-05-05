<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Integrante;
use App\Models\Slider;
use Illuminate\Http\Request;

class SortableController extends Controller
{
    public function ordenador(Request $request)
    {
        $order = 1;
        $sorts = $request->get('sorts');

        foreach ($sorts as $sort) {
            $integrante = Integrante::find($sort);
            $integrante->order = $order;
            $integrante->save();
            $order++;
        }
    }

    public function slider(Request $request)
    {
        $orden = 1;
        $sorts = $request->get('sorts');

        foreach ($sorts as $sort) {
            $slider = Slider::find($sort);
            $slider->order = $orden;
            $slider->save();
            $orden++;
        }
    }
}
