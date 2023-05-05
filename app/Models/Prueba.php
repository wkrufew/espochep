<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    /* protected $filable = [
        'title',
        'content',
        'locale'
    ]; */
    protected $guarded = ['id'];
}
