<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billingOrders extends Model
{
    use HasFactory;
    public $timestamps = false; //Evita que Laravel ingrese las fechas de cuando se crean y modifican los registros
    protected $table = 'billingOrders';        // Tabla customers en la base de datos
    protected $primaryKey = 'idbillingOrder'; // Llave primaria

    protected $fillable = [
        'idbillingOrder',
        'idCustomer',
        'invoiceNumber',
        'seller',
        'paymentMethod',
        'totalBilling',
        'totalPrice',
        'taxes',
        'deliveryDate',
        'saleComments',
        'dateCreation',
        'dateLastEdit',
        'userNameLastEdit',
    ];

    public function productSale()
    {
        return $this->hasMany(ProductSale::class, 'idbillingOrder');
    }

    // Relación con la tabla Customers
    public function customers(){
        return $this->belongsTo(Customers::class, 'idCustomer');
    }
}
