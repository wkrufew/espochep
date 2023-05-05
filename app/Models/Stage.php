<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function surrender()
    {
        return $this->belongsTo(Surrender::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
