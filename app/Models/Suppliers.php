<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'suppliers';        // Tabla customers en la base de datos
    protected $primaryKey = 'idSupplier'; // Llave primaria

    protected $fillable = [
        'idSupplier',
        'supplierID',
        'supplierName',
        'supplierContact',
        'supplierEmail1',
        'supplierEmail2',
        'supplierPhone1',
        'supplierPhone2',
        'supplierAddress',
        'isSupplierActive',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];
}
