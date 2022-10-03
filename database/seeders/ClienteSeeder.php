<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'id' => '8',
        ]);
        Cliente::create([
            'id' => '9',
        ]);
        Cliente::create([
            'id' => '10',
        ]);
        Cliente::create([
            'id' => '11',
        ]);
        Cliente::create([
            'id' => '12',
        ]);
    }
}
