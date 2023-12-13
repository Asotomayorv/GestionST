<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'brands';        // Tabla calls en la base de datos
    protected $primaryKey = 'idBrand'; // Llave primaria
    
    protected $fillable = [
        'idBrand',
        'brandName',
    ];

    // Relación con la tabla Suppliers
    public function brands(){
        return $this->belongsTo(Brands::class, 'idBrand');
    }
}
