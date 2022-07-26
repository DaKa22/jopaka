<?php

namespace Database\Seeders;

use App\Models\proveedor;
use Illuminate\Database\Seeder;

class proveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proveedor=[
            [
                'nombre'=> 'Mercado Libre' ,
                'nit'=> 891100654,
                'telefono'=> 3112305184,
                'direccion' => 'Calle 55 #45-57'
            ],
            [
                'nombre'=> 'Amazon Co' ,
                'nit'=> 891100745,
                'telefono'=> 31123056954,
                'direccion' => 'Calle 21 #35-65'
            ],
            [
                'nombre'=> 'Linio' ,
                'nit'=> 891100584,
                'telefono'=> 31123058741,
                'direccion' => 'Calle 12 #35-45'
            ],
            [
                'nombre'=> 'Shopee' ,
                'nit'=> 891100871,
                'telefono'=> 3112305365,
                'direccion' => 'Calle 65 #32-01'
            ],
            [
                'nombre'=> 'AliExpress' ,
                'nit'=> 891100654,
                'telefono'=> 3112305184,
                'direccion' => 'Calle 55 #45-57'
            ],
        ];
        foreach ($proveedor as $key => $value) {
            proveedor::create([
                'nombre'=>$value['nombre'],
                'nit'=>$value['nit'],
                'telefono'=>$value['telefono'],
                'direccion'=>$value['direccion'],
            ]);
        }
    }
}
