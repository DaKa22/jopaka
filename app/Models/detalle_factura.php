<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'facturas_id',
        'productos_id',
        'cantidad_pedida',
        'precio_total'
     ];
public function facturas()
{
    return $this->belongsTo(factura::class);
}
public function productos()
{
    return $this->belongsTo(producto::class);
}


}
