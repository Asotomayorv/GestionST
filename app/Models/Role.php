<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';       // Tabla roles en la base de datos
    protected $primaryKey = 'idRole'; // Llave primaria
}
