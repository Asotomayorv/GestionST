<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallOrders extends Model
{
    use HasFactory;

    public $timestamps = false;         //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'installationOrders'; // Tabla installationOrders en la base de datos
    protected $primaryKey = 'idinstallation';   // Llave primaria
    
    protected $fillable = [
        'idinstallation',
        'idRoute',
        'installationDate',
        'installationComments',
        'installationDetails',
        'installationType',
        'installationStatus',
        'installationEstimateHours',
        'installationTravelHours',
        'installationTotalHours',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    public function productInstall()
    {
        return $this->hasMany(ProductInstall::class, 'idinstallation');
    }

    // Relación con la tabla Routes
    public function routes(){
        return $this->belongsTo(VisitRoutes::class, 'idRoute');
    }
}
