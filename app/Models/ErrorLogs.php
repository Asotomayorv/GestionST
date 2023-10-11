<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLogs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'errorLogs';    // Tabla errorLogs en la base de datos
    protected $primaryKey = 'iderror'; // Llave primaria

    protected $fillable = [
        'iderror',
        'idUser',
        'errorMessage',
        'errorCode',
        'errorSource',
        'dateCreation',
    ];
}
