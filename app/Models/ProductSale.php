<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'productSale';        // Tabla calls en la base de datos
    protected $primaryKey = 'idProductSale'; // Llave primaria

    protected $fillable = [
        'idProductSale',
        'idbillingOrder',
        'idproduct',
        'productQuantity',
        'installationRequired',
        'dateCreation',            
        'userNameLastEdit',  
    ];

    // Relación con la tabla Suppliers
    public function billingOrders(){
        return $this->belongsTo(billingOrders::class, 'idbillingOrder');
    }

    // Relación con la tabla products
    public function products(){
        return $this->belongsTo(Product::class, 'idproduct');
    }

    public function productQualityControl(){
        return $this->hasOne(ProductQualityControl::class, 'idProductSale');
    }

    public function productWarranty(){
        return $this->hasOne(productWarranty::class, 'idproductSale');
    }
}
