<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transparency extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    //protected $with = ['transparency'];

    public function years()
    {
        return $this->hasMany(Year::class);
        
    }
}
