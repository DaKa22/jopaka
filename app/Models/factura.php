<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'clientes_id',
        'total_factura'
     ];

public function clientes()
{
    return $this->belongsTo(cliente::class);
}
public function detalle_facturas()
{
    return $this->hasMany(detalle_factura::class,'facturas_id');
}
}
