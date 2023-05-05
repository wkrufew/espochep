<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class NoticeFilter extends Component
{
    use withPagination;

    public $orden = 'DESC';
    public $categoria = [];

    public $view = "grid";

    public function render()
    {
        $categories = Category::select('id','name_es','name_en')->get();

        if (count($this->categoria) > 0) {
            $notices = Notice::with('moderador','image')->whereNotIn('status', [1,3])->whereIn('category_id', $this->categoria)->orderBy('id',$this->orden)->paginate(6);
        } else {
            $notices = Notice::with('moderador','image')->whereNotIn('status', [1,3])->orderBy('id',$this->orden)->paginate(6);
        }
        return view('livewire.notice-filter', compact('notices','categories'));
    }

    public function limpiar(){
        $this->orden = 'DESC';
        $this->categoria = [];
    }
}
