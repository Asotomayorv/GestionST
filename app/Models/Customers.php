<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'customers';        // Tabla users en la base de datos
    protected $primaryKey = 'idCustomer'; // Llave primaria
    
    protected $fillable = [
        'idCustomer',
        'customertypeID',
        'customerID',
        'customerName',
        'customerLastName',
        'customerContact',
        'customerEmail1',
        'customerEmail2',
        'customerPhone1',
        'customerPhone2',
        'customerAddress1',
        'customerAddress2',
        'customerTaxes',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];
}
