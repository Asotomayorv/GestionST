<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRoutes extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'visitRoutes';        // Tabla customers en la base de datos
    protected $primaryKey = 'idroute'; // Llave primaria

    protected $fillable = [
        'idroute',
        'idCustomer',
        'routeType',
        'routePriority',
        'routeTechnicianAssigned',
        'routeStatus',
        'routeAddress',
        'routeComments',
        'idProvince',
        'idCanton',
        'idDistrict',
        'startDate',
        'endDate',
        'startTime',
        'endTime',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    // Relación con la tabla Customers
    public function customers(){
        return $this->belongsTo(Customers::class, 'idCustomer');
    }

    // Relación con la tabla Customers
    public function provinces(){
        return $this->belongsTo(Provinces::class, 'idProvince');
    }

    // Relación con la tabla Customers
    public function cantons(){
        return $this->belongsTo(Cantons::class, 'idCanton');
    }

    // Relación con la tabla Customers
    public function districts(){
        return $this->belongsTo(Districts::class, 'idDistrict');
    }
}
