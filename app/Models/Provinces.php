<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'provinces';  // Tabla calls en la base de datos
    protected $primaryKey = 'idProvince'; // Llave primaria
    
    protected $fillable = [
        'idProvince',
        'provinceName',
    ];
}
