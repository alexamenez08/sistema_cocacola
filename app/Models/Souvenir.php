<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    //* variables
    protected $fillable = ['nombre','precio','stock','descripcion','categoria'];
}
