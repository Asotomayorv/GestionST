<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'products';        // Tabla calls en la base de datos
    protected $primaryKey = 'idproduct'; // Llave primaria
    
    protected $fillable = [
        'idproduct',//
        'idSupplier',//
        'productCode',//
        'productCategory',//
        'productName',//
        'productSeries',
        'productBrand',//
        'productModel',//
        'productExchangeRateCost',//
        'productExchangeRateSale',//
        'productCostDollars',//
        'productSaleDollars',//
        'productCostColones',//
        'productSaleColones',//
        'productProfitPercentage',//
        'productDescription',//
        'productQuantity',//
        'minimumProduct',
        'maximumProduct',
        'productLocation1',
        'productLocation2',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    // Relación con la tabla Suppliers
    public function suppliers(){
        return $this->belongsTo(Suppliers::class, 'idSupplier');
    }

    // Relación con la tabla Suppliers
    public function brands(){
        return $this->belongsTo(Brands::class, 'productBrand');
    }

    // Relación con la tabla Suppliers
    public function models(){
        return $this->belongsTo(Models::class, 'productModel');
    }
}
