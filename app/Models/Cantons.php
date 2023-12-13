<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantons extends Model
{
    use HasFactory;

    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'cantons';  // Tabla calls en la base de datos
    protected $primaryKey = 'idCanton'; // Llave primaria
    
    protected $fillable = [
        'idCanton',
        'cantonName',
        'idProvince',
    ];

    // Relación con la tabla Customers
    public function provinces(){
        return $this->belongsTo(Provinces::class, 'idProvince');
    }
}
