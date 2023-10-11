<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'users';        // Tabla users en la base de datos
    protected $primaryKey = 'idUser'; // Llave primaria
    
    protected $fillable = [
        'idUser',
        'userID',
        'userName',
        'userLastName1',
        'userLastName2',
        'userEmail',
        'systemUser',
        'userPassword_hash',
        'isUserActive',
        'idRole',
        'userToken',
        'dateCreation',
        'userNameLastEdit',
        'dateLastEdit',
    ];

    // Relación con la tabla Roles
    public function role(){
        return $this->belongsTo(Role::class, 'idRole');
    }

    // Relación con la tabla errorLogs
    public function errorLogs(){
        return $this->belongsTo(Role::class, 'iderror');
    }

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
