<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function transparency()
    {
        return $this->belongsTo(Transparency::class);
    }

    public function months()
    {
        return $this->hasMany(Month::class);
    }
}
