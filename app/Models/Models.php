<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'models';        // Tabla calls en la base de datos
    protected $primaryKey = 'idModel'; // Llave primaria
    
    protected $fillable = [
        'idModel',
        'idBrand',
        'modelName',
    ];
}
