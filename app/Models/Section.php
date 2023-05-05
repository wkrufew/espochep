<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
