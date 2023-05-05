<?php

namespace App\Http\Livewire\Moderador\Processes;

use App\Models\Process;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProcessesCurriculum extends Component
{
    use AuthorizesRequests;

    public $process, $section, $title_es, $title_en, $url_file;

    protected $rules = [
        'section.title_es' => 'required',
        'section.title_en' => 'required',
        'section.url_file' => 'nullable'
    ];

    public function mount(Process $process)
    {
        $this->process = $process;
        $this->section = new Section();
        $this->authorize('mod_processes',$process);
    }
    public function render()
    {
        return view('livewire.moderador.processes.processes-curriculum')->layout('layouts.moderador', ['process' => $this->process]);
    }

    public function edit(Section $section)
    {
        $this->section = $section;
    }

    public function update()
    {
        $this->validate();
        $this->section->save();
        $this->section = new Section();

        $this->process = Process::find($this->process->id);
    }

    public function store()
    {
        $rules = [
            'title_es' => 'required',
            'title_en' => 'required',
            'url_file' => 'nullable'
        ];

        $this->validate($rules);
        
        Section::create([
            'title_es' => $this->title_es,
            'title_en' => $this->title_en,
            'url_file' => $this->url_file,
            'process_id' => $this->process->id
        ]);

        $this->reset('title_es','title_en','url_file');

        $this->process = Process::find($this->process->id);
    }

    public function destroy(Section $item)
    {
        $item->delete();

        $this->process = Process::find($this->process->id);
    }
}
