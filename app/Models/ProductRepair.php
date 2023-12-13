<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRepair extends Model
{
    use HasFactory;

    public $timestamps = false;         //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'productRepair'; // Tabla installationOrders en la base de datos
    protected $primaryKey = 'idProductRepair';   // Llave primaria

    protected $fillable = [
        'idProductRepair',
        'idrepair',
        'productName',
        'productSeries',
        'productBrand',            
        'productModel',  
        'productQuantity',
        'productDamageComments',
        'dateCreation',
        'userNameLastEdit',
    ];

    // Relación con la tabla Suppliers
    public function repairOrders(){
        return $this->belongsTo(Repairs::class, 'idrepair');
    }
}
