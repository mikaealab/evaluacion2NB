<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Piloto extends Model
{
    use HasFactory;
    protected $fillable = [
        'DNI',
        'nombre',
        'latitud1',
        'longitud1',
        'hora1',
        'latitud2',
        'longitud2',
        'hora2',
        'latitud3',
        'longitud3',        
        'hora3',
    ];
}
