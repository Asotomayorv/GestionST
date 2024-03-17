<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLogs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'auditLogs';  // Tabla auditLogs en la base de datos
    protected $primaryKey = 'idLog'; // Llave primaria
    //Campos de la tabla
    protected $fillable = [
        'idLog',
        'idUser',
        'userAction',
        'userEvent',
        'dateCreation',
    ];

    // Relación con la tabla Users
    public function users(){
        return $this->belongsTo(User::class, 'idUser');
    }

    //Función para insertar logs a la tabla
    public static function logActivity($userId, $action, $event)
    {
        self::create([
            'idUser' => $userId,
            'userAction' => $action,
            'userEvent' => $event,
        ]);
    }
}
