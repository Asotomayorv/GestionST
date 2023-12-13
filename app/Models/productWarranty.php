<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productWarranty extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'productWarranty';        // Tabla customers en la base de datos
    protected $primaryKey = 'idproductWarranty'; // Llave primaria

    protected $fillable = [
        'idproductWarranty',
        'idproductSale',
        'technicianComments',
        'totalWarranty',
        'purchaseDate',
        'deliveryDate',
        'invoiceNumber',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    // Relación con la tabla products
    public function productSale(){
        return $this->belongsTo(productSale::class, 'idproductSale');
    }
}
