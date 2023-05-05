<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
