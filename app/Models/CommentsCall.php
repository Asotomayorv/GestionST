<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsCall extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'commentsCall';        // Tabla customers en la base de datos
    protected $primaryKey = 'idCommentCall'; // Llave primaria

    protected $fillable = [
        'idCommentCall',
        'idCall',
        'commentCall',
        'dateCreation',
        'userNameLastEdit',
    ];

    // Relación con la tabla Customers
    public function customers(){
        return $this->belongsTo(Call::class, 'idCall');
    }
}
