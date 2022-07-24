<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'proveedores_id',
        'precio_costo',
        'precio_venta',
        'foto'
     ];
public function proveedores()
{
    return $this->belongsTo(proveedor::class);
}
public function detalle_facturas()
{
    return $this->hasMany(detalle_factura::class,'productos_id');
}
}
