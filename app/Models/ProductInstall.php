<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInstall extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'productInstall';        // Tabla calls en la base de datos
    protected $primaryKey = 'idProductInstall'; // Llave primaria

    protected $fillable = [
        'idProductInstall',
        'idInstallation',
        'idproduct',
        'productQuantity',
        'dateCreation',            
        'userNameLastEdit',  
    ];

    // Relación con la tabla Suppliers
    public function installationOrders(){
        return $this->belongsTo(installationOrders::class, 'idinstallation');
    }

    // Relación con la tabla products
    public function products(){
        return $this->belongsTo(Product::class, 'idproduct');
    }
}
