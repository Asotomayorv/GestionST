<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechService extends Model
{
    use HasFactory;

    public $timestamps = false;         //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'technicalServiceOrders'; // Tabla technicalServiceOrders en la base de datos
    protected $primaryKey = 'idtechnicalServiceOrder';   // Llave primaria
    
    protected $fillable = [
        'idtechnicalServiceOrder',
        'idRoute',
        'technicalServiceComments',
        'technicalServiceDate',
        'technicalServiceStatus',
        'technicalServiceEstimateHours',
        'technicalServiceTravelHours',
        'technicalServiceTotalHours',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    // Relación con la tabla Routes
    public function routes(){
        return $this->belongsTo(VisitRoutes::class, 'idRoute');
    }
}
