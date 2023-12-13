<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    public $timestamps = false;         //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'incomingCalls'; // Tabla calls en la base de datos
    protected $primaryKey = 'idCall';   // Llave primaria
    
    protected $fillable = [
        'idCall',
        'idCustomer',
        'callSubject',
        'callStatus',
        'callMarketing',
        'callComments',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    // Relación con la tabla Customers
    public function customers(){
        return $this->belongsTo(Customers::class, 'idCustomer');
    }
}
