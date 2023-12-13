<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairDetails extends Model
{
    use HasFactory;
    public $timestamps = false;         //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'repairDetails'; // Tabla installationOrders en la base de datos
    protected $primaryKey = 'idRepairDetails';   // Llave primaria

    protected $fillable = [
        'idRepairDetails',
        'idProductRepair',
        'repairDetailsComments',
        'dateCreation',
        'userNameLastEdit',
    ];

    // Relación con la tabla Suppliers
    public function productRepair(){
        return $this->belongsTo(ProductRepair::class, 'idProductRepair');
    }

    public function spareParts()
    {
        return $this->hasMany(SpareParts::class, 'idRepairDetails');
    }
}
