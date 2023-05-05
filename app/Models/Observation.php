<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = ['body','process_id'];

    //relacion uno a muchos inversa
    public function process()
    {
        return $this->belongsTo(Process::class);
    }
}
