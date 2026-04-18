<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coleccion extends Model
{
    use HasFactory;

    protected $table = 'collections';

    // ← Esto le dice a Laravel cómo llamar el parámetro en la URL
    public function getRouteKeyName()
    {
        return 'id';
    }
    
    protected $fillable = ['nombre','anio','descripcion'];

}
