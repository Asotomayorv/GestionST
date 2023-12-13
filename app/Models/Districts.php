<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'districts';  // Tabla calls en la base de datos
    protected $primaryKey = 'idDistrict'; // Llave primaria
    
    protected $fillable = [
        'idDistrict',
        'districtName',
        'idCanton',
    ];

    // Relación con la tabla Customers
    public function cantons(){
        return $this->belongsTo(Cantons::class, 'idCanton');
    }
}
