<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Proveedor extends Model
{
    use HasFactory;

    //nombre de la tabla
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'user_id',
    ];

    //relacion de un proveedor que pretenece a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }
}


//llenar con los datos de los fillabale proveedores ademas de relacionar con la tabla usuarios