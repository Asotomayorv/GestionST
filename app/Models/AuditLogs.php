<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLogs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'auditLogs';    // Tabla errorLogs en la base de datos
    protected $primaryKey = 'idLog'; // Llave primaria

    protected $fillable = [
        'idLog',
        'idUser',
        'userAction',
        'userEvent',
        'dateCreation',
    ];

    // Relación con la tabla Customers
    public function users(){
        return $this->belongsTo(User::class, 'idUser');
    }

    public static function logActivity($userId, $action, $event)
    {
        self::create([
            'idUser' => $userId,
            'userAction' => $action,
            'userEvent' => $event,
        ]);
    }
}
