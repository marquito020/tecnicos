<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin = Role::create(['name' => 'super_admin']);
        $admin = Role::create(['name' => 'admin']);
        $cliente = Role::create(['name' => 'cliente']);
        $tecnico = Role::create(['name' => 'tecnico']);

        Permission::create(['name' => 'super_admin'])->syncRoles([$super_admin]);
        Permission::create(['name' => 'admin'])->syncRoles([$admin]);
        Permission::create(['name' => 'cliente'])->syncRoles([$cliente]);
        Permission::create(['name' => 'tecnico'])->syncRoles([$tecnico]);

        /* administrador */
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$admin]);

        /* clientes */
        Permission::create(['name' => 'cliente.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'cliente.users.create'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'cliente.users.edit'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'cliente.users.update'])->syncRoles([$admin, $cliente]);
        Permission::create(['name' => 'cliente.users.destroy'])->syncRoles([$admin]);

        /* tecnicos */
        Permission::create(['name' => 'tecnico.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'tecnico.users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'tecnico.users.edit'])->syncRoles([$tecnico, $admin]);
        Permission::create(['name' => 'tecnico.users.update'])->syncRoles([$tecnico, $admin]);
        Permission::create(['name' => 'tecnico.users.destroy'])->syncRoles([$tecnico, $admin]);

        /* marcado asistencia */
        Permission::create(['name' => 'marcado.index'])->syncRoles([$tecnico]);
        Permission::create(['name' => 'marcado.create'])->syncRoles([$tecnico]);

        /* asistencia */
        Permission::create(['name' => 'asistencia.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'asistencia.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'asistencia.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'asistencia.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'asistencia.destroy'])->syncRoles([$admin]);

        /* formulario */
        Permission::create(['name' => 'cliente.formulario.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'cliente.formulario.create'])->syncRoles([$cliente, $admin]);
        Permission::create(['name' => 'cliente.formulario.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'cliente.formulario.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'cliente.formulario.destroy'])->syncRoles([$admin]);

        /* Servicios */
        Permission::create(['name' => 'servicio.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'servicio.index.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'servicio.index.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'servicio.index.destroy'])->syncRoles([$admin]);

        /* informe */
        Permission::create(['name' => 'informe.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'informe.create'])->syncRoles([$tecnico]);
        Permission::create(['name' => 'informe.edit'])->syncRoles([$tecnico]);
        Permission::create(['name' => 'informe.update'])->syncRoles([$tecnico]);
        Permission::create(['name' => 'informe.destroy'])->syncRoles([$admin]);

        /* trabajo asignado */
        Permission::create(['name' => 'trabajo.index'])->syncRoles([$tecnico, $admin]);
        Permission::create(['name' => 'trabajo.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'trabajo.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'trabajo.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'trabajo.destroy'])->syncRoles([$admin]);

        /* control trabajo */
        Permission::create(['name' => 'control.index'])->syncRoles([$tecnico]);
        Permission::create(['name' => 'control.create'])->syncRoles([$tecnico, $admin]);
        Permission::create(['name' => 'control.edit'])->syncRoles([$tecnico]);
        Permission::create(['name' => 'control.update'])->syncRoles([$tecnico]);
        Permission::create(['name' => 'control.destroy'])->syncRoles([$admin]);
    }
}
