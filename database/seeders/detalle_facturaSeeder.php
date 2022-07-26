<?php

namespace Database\Seeders;

use App\Models\detalle_factura;
use Illuminate\Database\Seeder;

class detalle_facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detalle_factura=[

            [
                'facturas_id'=>random_int(1,5),
                'productos_id'=>random_int(1,5),
                'cantidad_pedida'=>8,
                'precio_total'=>1500000
            ],

            [
                'facturas_id'=>random_int(1,5),
                'productos_id'=>random_int(1,5),
                'cantidad_pedida'=>5,
                'precio_total'=>1470000
            ],


            [
                'facturas_id'=>random_int(1,5),
                'productos_id'=>random_int(1,5),
                'cantidad_pedida'=>7,
                'precio_total'=>5000000
            ],

            [
                'facturas_id'=>random_int(1,5),
                'productos_id'=>random_int(1,5),
                'cantidad_pedida'=>4,
                'precio_total'=>4700000
            ],

            [
                'facturas_id'=>random_int(1,5),
                'productos_id'=>random_int(1,5),
                'cantidad_pedida'=>6,
                'precio_total'=>1200000
            ],

        ];

        foreach ($detalle_factura as $key => $value) {
            detalle_factura::create([
                'facturas_id'=>$value['facturas_id'],
                'productos_id'=>$value['productos_id'],
                'cantidad_pedida'=>$value['cantidad_pedida'],
                'precio_total'=>$value['precio_total'],
            ]);
        }
    }
}
