<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingCompany extends Component
{
    use WithFileUploads;

    public $setting;
    public $phone1;
    public $phone2;
    public $email1;
    public $email2;
    public $direction;
    public $url_nosotros;
    public $foto;

    public function __construct()
    {
        $this->setting = Setting::first();
    }

    public function mount()
    {
        if ($this->setting) {
            $this->phone1 = $this->setting->phone1;
            $this->phone2 = $this->setting->phone2;
            $this->email1 = $this->setting->email1;
            $this->email2 = $this->setting->email2;
            $this->direction = $this->setting->direction;
            $this->url_nosotros = $this->setting->url_nosotros;
        }
    }

    public function render()
    {
        
        return view('livewire.administrador.setting-company');
    }
    public function control()
    {   
        if ($this->setting) {
            $this->update();
        }else{
            $this->save();
        }
    }
    public function save()
    {
        $this->validate([
            'phone1' => 'required',
            'phone2' => 'required',
            'email1' => 'required|email',
            'email2' => 'nullable|email',
            'direction' => 'required',
            'url_nosotros' => 'nullable|image|max:2048'
        ]);

        if ($this->foto) {
            $this->foto = $this->foto->store('integrantes');
        }

        $this->resetErrorBag();
        
        Setting::create([
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'email1' => $this->email1,
            'email2' => $this->email2,
            'direction' => $this->direction,
            'url_nosotros' => $this->foto,
        ]);

        Cache::forget('settings');
        session()->flash('exito', 'Guardado con exito.');
    }

    private function resetInput()
    {
        $this->foto = null;
    }

    public function update()
    {
        $this->validate([
            'phone1' => 'required',
            'phone2' => 'required',
            'email1' => 'required|email',
            'email2' => 'nullable|email',
            'direction' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);
        //dd($this->url_nosotros);
        /* $config = Setting::first(); */
        if ($this->foto) {
            $this->foto = $this->foto->store('integrantes');
            
            if ($this->url_nosotros) {
                Storage::delete($this->url_nosotros);
                $this->url_nosotros = $this->foto;
            }else{
                $this->url_nosotros = $this->foto;
            }
        }
        
        $this->resetErrorBag();

        $this->setting->phone1 = $this->phone1;
        $this->setting->phone2 = $this->phone2;
        $this->setting->email1 = $this->email1;
        $this->setting->email2 = $this->email2;
        $this->setting->direction = $this->direction;
        $this->setting->url_nosotros = $this->url_nosotros;
        $this->setting->save();

        $this->resetInput();

        Cache::forget('settings');
        session()->flash('exito', 'Guardado con exito.');
    }
}
