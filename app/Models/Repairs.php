<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairs extends Model
{
    use HasFactory;
    
    public $timestamps = false; // Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    
    protected $table = 'repairOrders'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idrepair'; // Llave primaria
    
    protected $fillable = [
        'idCustomer',
        'repairOrigin',
        'repairType',
        'repairComments',
        'technicianAssigned',
        'receivingDate',
        'repairStatus',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    // Relación con la tabla 'customers' (clave foránea)
    public function customers()
    {
        return $this->belongsTo(Customers::class, 'idCustomer', 'idCustomer');
    }

    public function productRepair()
    {
        return $this->hasMany(ProductRepair::class, 'idrepair');
    }
}
