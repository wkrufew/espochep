<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectFilter extends Component
{
    use withPagination;

    public $orden = 'DESC';

    public function render()
    {
        $projects = Project::with('moderador','image')->whereNotIn('status', [4])->orderBy('id',$this->orden)->paginate(6);

        return view('livewire.project-filter', compact('projects'));
    }

    public function limpiar(){
        $this->orden = 'DESC';
    }
}
