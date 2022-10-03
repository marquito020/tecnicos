<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('12345678');

        User::create([
            'email' => 'torrez-juan@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '1',
            'id_rol' => '1',
        ])->assignRole('super_admin');

        User::create([
            'email' => 'maria@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '2',
            'id_rol' => '4',
        ])->assignRole('tecnico');

        User::create([
            'email' => 'sofia@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '3',
            'id_rol' => '2',
        ])->assignRole('admin');

        User::create([
            'email' => 'gonzales@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '4',
            'id_rol' => '2',
        ])->assignRole('admin');

        User::create([
            'email' => 'josue@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '5',
            'id_rol' => '2',
        ])->assignRole('admin');

        User::create([
            'email' => 'andresF@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '6',
            'id_rol' => '4',
        ])->assignRole('tecnico');

        User::create([
            'email' => 'luci@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '7',
            'id_rol' => '4',
        ])->assignRole('tecnico');

        User::create([
            'email' => 'molina@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '8',
            'id_rol' => '4',
        ])->assignRole('tecnico');

        User::create([
            'email' => 'luis@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '9',
            'id_rol' => '3',
        ])->assignRole('cliente');

        User::create([
            'email' => 'enrique@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '10',
            'id_rol' => '3',
        ])->assignRole('cliente');

        User::create([
            'email' => 'santiago@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '11',
            'id_rol' => '3',
        ])->assignRole('cliente');

        User::create([
            'email' => 'guzman@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '12',
            'id_rol' => '3',
        ])->assignRole('cliente');

        User::create([
            'email' => 'marcelo@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '13',
            'id_rol' => '3',
        ])->assignRole('cliente');

        User::create([
            'email' => 'felipe@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '14',
            'id_rol' => '4',
        ])->assignRole('tecnico');

        User::create([
            'email' => 'angela@gmail.com',
            'password' => $password,
            'enable' => '1',
            'id_persona' => '15',
            'id_rol' => '4',
        ])->assignRole('tecnico');
    }
}
