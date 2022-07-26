<?php

namespace Database\Seeders;

use App\Models\factura;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factura=[
            [
                'fecha' => Carbon::now(),
                'clientes_id' => random_int(1,5),
                'total_factura' => random_int(20000,100000)
            ],
            [
                'fecha' => Carbon::now(),
                'clientes_id' => random_int(1,5),
                'total_factura' => random_int(20000,100000)
            ],
            [
                'fecha' => Carbon::now(),
                'clientes_id' => random_int(1,5),
                'total_factura' => random_int(20000,100000)
            ],
            [
                'fecha' => Carbon::now(),
                'clientes_id' => random_int(1,5),
                'total_factura' => random_int(20000,100000)
            ],
            [
                'fecha' => Carbon::now(),
                'clientes_id' => random_int(1,5),
                'total_factura' => random_int(20000,100000)
            ],
        ];
        foreach ($factura as $key => $value) {
            factura::create([
                'fecha'=>$value['fecha'],
                'clientes_id'=>$value['clientes_id'],
                'total_factura'=>$value['total_factura'],
            ]);
        }
    }
}
