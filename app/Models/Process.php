<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    const BORRADOR = 1;
    const EJECUCION = 2;
    const FINALIZADO = 3;
    const DESIERTO = 4;
    const REVISION = 5;
    const ELIMINADO = 6;

    public function getRouteKeyName()
    {
       return "slug"; 
    }

    //relacion uno a uno
    public function observation()
    {
        return $this->hasOne(Observation::class);
    }

    //relacion uno a muchos inversa
    public function moderador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    //relacion uno a muchos inverso
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    //relacion muchos a muchos *(ojo ver si funciona con el user_id o si no quitarlo)
    public function proveedores()
    {
        return $this->belongsToMany(User::class)->withPivot('status','monto','cantidad','url')->withTimestamps();
    }

/*     //relacion uno a uno polimorfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    } */

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    
}
