<?php

namespace Database\Seeders;

use App\Models\Tecnico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tecnico::create([
            'id' => '2',
            'profesion' => 'Ing. Sistemas',
            'estado' => 'Fuera de servicio',
            'latitude' => null,
            'longitude' => null,
        ]);
        Tecnico::create([
            'id' => '6',
            'profesion' => 'Ing. Sistemas',
            'estado' => 'Fuera de servicio',
            'latitude' => null,
            'longitude' => null,
        ]);
        Tecnico::create([
            'id' => '7',
            'profesion' => 'Ing. Redes',
            'estado' => 'Fuera de servicio',
            'latitude' => null,
            'longitude' => null,
        ]);
        Tecnico::create([
            'id' => '8',
            'profesion' => 'Ing. Electrico',
            'estado' => 'Fuera de servicio',
            'latitude' => null,
            'longitude' => null,
        ]);
        Tecnico::create([
            'id' => '14',
            'profesion' => 'Ing. Electrico',
            'estado' => 'Fuera de servicio',
            'latitude' => null,
            'longitude' => null,
        ]);
        Tecnico::create([
            'id' => '15',
            'profesion' => 'Ing. Electrico',
            'estado' => 'Fuera de servicio',
            'latitude' => null,
            'longitude' => null,
        ]);
    }
}
