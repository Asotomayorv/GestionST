<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQualityControl extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'productQualityControl';        // Tabla calls en la base de datos
    protected $primaryKey = 'idQualityControl'; // Llave primaria

    protected $fillable = [
        'idQualityControl',
        'idProductSale',
        'technicianAssigned', 
        'technicianComments', 
        'accesories',
        'adapter',
        'sound',
        'keyboard',
        'reader',
        'carReader',
        'display',
        'battery',
        'cases',
        'installationBase',
        'communication',
        'tcpIp',
        'rs485',
        'miniUSB',
        'rs232',
        'downUSB',
        'downSDCard',
        'camera',
        'wifi',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit', 
    ];

    // Relación con la tabla products
    public function productSale(){
        return $this->belongsTo(productSale::class, 'idProductSale');
    }
}
