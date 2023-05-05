<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    const BORRADOR = 1;
    const PROCESO = 2;
    const TERMINADO = 3;
    const ELIMINADO = 4;
    
    public function moderador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fases()
    {
        return $this->hasMany(Fase::class);
    }

    //relacion uno a uno polimorfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
    public function getRouteKeyName()
    {
       return "slug"; 
    }

}
