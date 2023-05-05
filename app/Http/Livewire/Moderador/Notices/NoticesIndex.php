<?php

namespace App\Http\Livewire\Moderador\Notices;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class NoticesIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $notices = Notice::where('user_id', auth()->user()->id)
                                ->whereNotIn('status', [3])
                                ->where('title_es', 'LIKE', '%' . $this->search . '%')
                                ->latest('id')
                                ->paginate(6);
        return view('livewire.moderador.notices.notices-index', compact('notices'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}
