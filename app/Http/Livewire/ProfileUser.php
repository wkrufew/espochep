<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileUser extends Component
{
    public $company;
    public $ruc;
    public $phone;
    public $direction;
    public $website;
    public $user;

    public function __construct()
    {
        $this->user = User::find(Auth::user()->id);
    }
    public function render()
    {
        if ($this->user->profile) {
            $this->company = $this->user->profile->company;
            $this->ruc = $this->user->profile->ruc;
            $this->phone = $this->user->profile->phone;
            $this->direction = $this->user->profile->direction;
            $this->website = $this->user->profile->website;
        }
        
        return view('livewire.profile-user');
    }

    public function control()
    {   
        if ($this->user->profile) {
            $this->update();
        }else{
            $this->save();
        }
    }

    public function save()
    {
        $rules = [
            'ruc' => 'required',
            'phone' => 'required',
            'direction' => 'required'
        ];

        $this->validate($rules);


        $this->resetErrorBag();

        $this->user->profile()->create([
            'company' => $this->company,
            'ruc' => $this->ruc,
            'phone' => $this->phone,
            'direction' => $this->direction,
            'website' => $this->website
        ]);

        $this->emit('saved');
        $this->emit('refresh-navigation-menu');
    }

    public function update()
    {
        $rules = [
            'ruc' => 'required',
            'phone' => 'required',
            'direction' => 'required'
        ];

        $this->validate($rules);
        
        $this->resetErrorBag();

        $this->user->profile->company = $this->company;
        $this->user->profile->ruc = $this->ruc;
        $this->user->profile->phone = $this->phone;
        $this->user->profile->direction = $this->direction;
        $this->user->profile->website = $this->website;
        $this->user->profile->save();

        $this->emit('saved');
        $this->emit('refresh-navigation-menu');
    }
}
