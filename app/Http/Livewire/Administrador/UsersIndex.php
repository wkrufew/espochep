<?php

namespace App\Http\Livewire\Administrador;

use App\Models\User;
use Livewire\WithPagination;

use Livewire\Component;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    protected $listeners = ['render'];

    public function render()
    {
        $users = User::with('roles')
                        ->where('status',1)
                        ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                        ->paginate(20);
        //dd($users);

        return view('livewire.administrador.users-index', compact('users'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }

    public function destroy(User $user)
    {
        
        //$user->status = 2;
        //dd($user->status);
        $user->update([
            'status' => 2
        ]);
        $this->emit('render');
        //User::destroy($id);
    }
}
