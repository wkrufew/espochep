<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    //realcion uno a muchos
    public function processes()
    {
        return $this->hasMany(Process::class);
    }
}
