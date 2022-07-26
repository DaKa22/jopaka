<?php

namespace Database\Seeders;

use App\Models\producto;
use Illuminate\Database\Seeder;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto=[
            [
                'descripcion'=> 'Logitech G 733 K/DA',
                'proveedores_id' => random_int(1,5),
                'precio_costo' => 453783,
                'precio_venta' => 653783,
                'foto' => 'https://images-na.ssl-images-amazon.com/images/I/71nHaiwCHmL.__AC_SX300_SY300_QL70_FMwebp_.jpg'
            ],
            [
                'descripcion'=> 'Logitech G 502 HERO K/DA',
                'proveedores_id' => random_int(1,5),
                'precio_costo' => 190590,
                'precio_venta' => 290590,
                'foto' => 'https://m.media-amazon.com/images/I/71g60fx8csL._AC_SX522_.jpg'
            ],
            [
                'descripcion'=> 'MSI 24 pulgadas FHD 1500R curvatura',
                'proveedores_id' => random_int(1,5),
                'precio_costo' => 581026,
                'precio_venta' => 681026,
                'foto' => 'https://m.media-amazon.com/images/I/61ANdv+2OxL._AC_SX300_SY300_.jpg'
            ],
            [
                'descripcion'=> 'MSI Raider GE66',
                'proveedores_id' => random_int(1,5),
                'precio_costo' => 13341178,
                'precio_venta' => 16341178,
                'foto' => 'https://m.media-amazon.com/images/I/716mebaqGlL._AC_SX522_.jpg'
            ],
            [
                'descripcion'=> 'Logitech G Pro',
                'proveedores_id' => random_int(1,5),
                'precio_costo' => 400216,
                'precio_venta' => 500216,
                'foto' => 'https://m.media-amazon.com/images/I/51K1mE5uVyL._AC_SX522_.jpg'
            ],
        ];
        foreach ($producto as $key => $value) {
            producto::create([
                'descripcion'=>$value['descripcion'],
                'proveedores_id'=>$value['proveedores_id'],
                'precio_costo'=>$value['precio_costo'],
                'precio_venta'=>$value['precio_venta'],
                'foto'=>$value['foto'],
            ]);
        }
    }
}
