<?php

namespace App\Http\Livewire\Moderador\Projects;

use App\Models\Fase;
use App\Models\Project;
use Livewire\Component;

class ProjectsCurriculum extends Component
{
    public $project, $fase, $name_es, $name_en,$description_es,$description_en, $url_file;

    protected $rules = [
        'fase.name_es' => 'required',
        'fase.name_en' => 'required',
        'fase.description_es' => 'nullable',
        'fase.description_en' => 'nullable',
        'fase.url_file' => 'nullable'
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->fase = new Fase();
        /* $this->authorize('mod_projectes',$project); */
    }

    public function render()
    {
        return view('livewire.moderador.projects.projects-curriculum')->layout('layouts.project', ['project' => $this->project]);
    }

    public function edit(Fase $fase)
    {
        $this->fase = $fase;
    }

    public function update()
    {
        $this->validate();
        $this->fase->save();
        $this->fase = new Fase();

        $this->project = Project::find($this->project->id);
    }

    public function store()
    {
        $rules = [
            'name_es' => 'required',
            'name_en' => 'required',
            'description_es' => 'nullable',
            'description_en' => 'nullable',
            'url_file' => 'nullable'
        ];

        $this->validate($rules);
        
        Fase::create([
            'name_es' => $this->name_es,
            'name_en' => $this->name_en,
            'description_es' => $this->description_es,
            'description_en' => $this->description_en,
            'url_file' => $this->url_file,
            'project_id' => $this->project->id
        ]);

        $this->reset('name_es','name_en','description_es','description_en','url_file');

        $this->project = Project::find($this->project->id);
    }

    public function destroy(Fase $item)
    {
        $item->delete();

        $this->project = Project::find($this->project->id);
    }
}
