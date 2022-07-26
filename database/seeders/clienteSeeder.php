<?php

namespace Database\Seeders;

use App\Models\cliente;
use Illuminate\Database\Seeder;

class clienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente=[
            [
                'identificacion'=> 1003807654,
                'nombres'=> 'Carlos ',
                'apellidos'=> 'Pastrana Gimenez',
                'telefono'=> 828352,
                'direccion' => 'Calle siempre viva'
            ],
            [
                'identificacion'=> 1003807741,
                'nombres'=> 'Mia ',
                'apellidos'=> 'Lopez',
                'telefono'=> 828364,
                'direccion' => 'Calle 14 #25-45'
            ],
            [
                'identificacion'=> 1003807284,
                'nombres'=> 'Valentina ',
                'apellidos'=> 'Fernandez',
                'telefono'=> 828384,
                'direccion' => 'Calle 14 #74-56'
            ],
            [
                'identificacion'=> 1003807582,
                'nombres'=> 'Felipe ',
                'apellidos'=> 'Gomez',
                'telefono'=> 828684,
                'direccion' => 'Calle 25 #48-31'
            ],
            [
                'identificacion'=> 1003807875,
                'nombres'=> 'Pablo ',
                'apellidos'=> 'Londra',
                'telefono'=> 828462,
                'direccion' => 'Calle 78 #22-21'
            ],
        ];
        foreach ($cliente as $key => $value) {
            cliente::create([
                'identificacion'=>$value['identificacion'],
                'nombres'=>$value['nombres'],
                'apellidos'=>$value['apellidos'],
                'telefono'=>$value['telefono'],
                'direccion'=>$value['direccion'],
            ]);
        }
    }
}
