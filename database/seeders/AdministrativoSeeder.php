<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrativo::create([
            'id' => '3',
            'profesion' => 'Recepcionista',
        ]);
        Administrativo::create([
            'id' => '4',
            'profesion' => 'Recepcionista',
        ]);
        Administrativo::create([
            'id' => '5',
            'profesion' => 'Recepcionista',
        ]);
    }
}
