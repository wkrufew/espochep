<?php

namespace App\Http\Livewire\Moderador\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $projects = Project::where('user_id', auth()->user()->id)
                                ->whereNotIn('status', [4])
                                ->where('title_es', 'LIKE', '%' . $this->search . '%')
                                ->latest('id')
                                ->paginate(6);

        return view('livewire.moderador.projects.projects-index', compact('projects'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }
}
