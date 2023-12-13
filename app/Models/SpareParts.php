<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    use HasFactory;
    public $timestamps = false;         //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'spareParts'; // Tabla installationOrders en la base de datos
    protected $primaryKey = 'idSparePart';   // Llave primaria

    protected $fillable = [
        'idSparePart',
        'idRepairDetails',
        'idproduct',
        'productQuantity',
        'dateCreation',
        'userNameLastEdit',
    ];

    // Relación con la tabla Suppliers
    public function repairDetails(){
        return $this->belongsTo(RepairDetails::class, 'idRepairDetails');
    }

    // Relación con la tabla products
    public function products(){
        return $this->belongsTo(Product::class, 'idproduct');
    }
}
