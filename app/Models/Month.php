<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
