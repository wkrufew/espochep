<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::paginate(6);
        return view('admin.purchases.index', compact('purchases'));
    }

    public function create()
    {
        return view('admin.purchases.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name_es.required' => 'El campo en español es requerido',
            'name_en.unique' => 'El tipo de compra ingresado ya existe', 
            'name_es.required' => 'El campo en ingles es requerido',           
        ];
        $rules = [
            'name_es'=> array('required', 'unique:purchases'),
            'name_en'=> array('required'),
        ];
        
        $this->validate($request, $rules, $messages);

        $purchase = Purchase::create($request->all());
        
        $pur = $request->name_es;
        $notificacion="El tipo de compra $pur  se ha añadido correctamente";

        return redirect()->route('admin.purchases.index')->with(compact('notificacion'));
    }


    public function edit(Purchase $purchase)
    {
        return view('admin.purchases.edit', compact('purchase'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $messages = [
            'name_es.required' => 'El campo en español es requerido',
            'name_es.unique' => 'El tipo de compra ingresado ya existe', 
            'name_es.required' => 'El campo en ingles es requerido',
        ];
        $rules = [
            'name_es'=> array('required', 'unique:purchases,name_es,'.$purchase->id),
            'name_en'=> array('required'),
        ];
        
        $this->validate($request, $rules, $messages);

        $purchase->update($request->all());

        $pur = $request->name_es;
        $notificacion="El tipo de compra  $pur  se ha actualizado correctamente";

        return redirect()->route('admin.purchases.index')->with(compact('notificacion'));
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        $pur = $purchase->name_es;
        $notificacion="El tipo de compra  $pur  se ha eliminado correctamente";

        return redirect()->route('admin.purchases.index')->with(compact('notificacion'));
    }
}
