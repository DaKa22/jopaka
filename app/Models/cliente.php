<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    protected $fillable = [
       'identificacion',
       'nombres',
       'apellidos',
       'telefono',
       'direccion'
    ];

public function facturas()
{
    return $this->hasMany(factura::class,'clientes_id');
}
}
