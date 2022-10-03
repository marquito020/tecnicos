<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'nombre' => 'Juan',
            'apellido_paterno' => 'Perez',
            'apellido_materno' => 'Perez',
            'ci' => '13945614',
            'direccion' => 'La Guardia',
            'email' => 'torrez-juan@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1999-05-23',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Maria',
            'apellido_paterno' => 'Salvatierra',
            'apellido_materno' => 'Molina',
            'ci' => '17115563',
            'direccion' => 'La Pampa De La Isla',
            'email' => 'maria.molina@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1989-12-25',
            'sexo' => 'F',
        ]);
        Persona::create([
            'nombre' => 'Sofia',
            'apellido_paterno' => 'Martines',
            'apellido_materno' => 'Peres',
            'ci' => '13836993',
            'direccion' => 'Los Lotes',
            'email' => 'Martines.sofia11@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1998-04-03',
            'sexo' => 'F',
        ]);
        Persona::create([
            'nombre' => 'Carlos Luis',
            'apellido_paterno' => 'Gozales',
            'apellido_materno' => 'Gonzales',
            'ci' => '12544790',
            'direccion' => 'Las Palmas',
            'email' => 'luisgg24@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1999-07-19',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Jose',
            'apellido_paterno' => 'Gomez',
            'apellido_materno' => 'Torrez',
            'ci' => '17056651',
            'direccion' => 'El Bajio',
            'email' => 'gomes-josue@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '2000-01-08',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Andres',
            'apellido_paterno' => 'Fernandez',
            'apellido_materno' => 'Sanchez',
            'ci' => '18367486',
            'direccion' => 'Cambodromo',
            'email' => 'andres_andres@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1997-07-08',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Lucia',
            'apellido_paterno' => 'Jimenes',
            'apellido_materno' => 'Garcia',
            'ci' => '12203665',
            'direccion' => 'Villa 1ero de Mayo',
            'email' => 'garcia_luci@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1994-04-29',
            'sexo' => 'F',
        ]);
        Persona::create([
            'nombre' => 'Jhon',
            'apellido_paterno' => 'Molina',
            'apellido_materno' => 'Gomez',
            'ci' => '18530070',
            'direccion' => 'Av Radial 27',
            'email' => 'molinajhom@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '2001-08-11',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Luis Alberto',
            'apellido_paterno' => 'Garcia',
            'apellido_materno' => 'Rodriguez',
            'ci' => '16259286',
            'direccion' => 'Av Roca y Coronado',
            'email' => 'luis_gp@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1991-09-25',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Enrrique',
            'apellido_paterno' => 'Lopez',
            'apellido_materno' => 'Sanchez',
            'ci' => '11880015',
            'direccion' => 'Av Bush',
            'email' => 'lopez_enriquee@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1989-01-10',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Santiago',
            'apellido_paterno' => 'Esquivel',
            'apellido_materno' => 'Burgoa',
            'ci' => '10129143',
            'direccion' => 'Av Landivar',
            'email' => 'burguoa-esquivel@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '2002-02-02',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Ricardo',
            'apellido_paterno' => 'Guzman',
            'apellido_materno' => 'Pedraza',
            'ci' => '17178978',
            'direccion' => 'Barrio Urbani',
            'email' => 'guzman.pedraza@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1999-09-09',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Marcelo',
            'apellido_paterno' => 'Mamani',
            'apellido_materno' => 'Perez',
            'ci' => '17030586',
            'direccion' => 'La Guardia',
            'email' => 'marcelo_perez24@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1994-04-17',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Felipe',
            'apellido_paterno' => 'Condo',
            'apellido_materno' => 'Mamani',
            'ci' => '19478422',
            'direccion' => 'Barrio 27 de Mayo',
            'email' => 'felize.1514@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1995-11-11',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Angela',
            'apellido_paterno' => 'Salvatierra',
            'apellido_materno' => 'Escobar',
            'ci' => '14879423',
            'direccion' => 'Doble Via La Guardia',
            'email' => 'escobar_angela@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1992-03-05',
            'sexo' => 'F',
        ]);
        Persona::create([
            'nombre' => 'Pamela',
            'apellido_paterno' => 'Roque',
            'apellido_materno' => 'Salas',
            'ci' => '13335886',
            'direccion' => 'Av Roque y Aguilera',
            'email' => 'roque_pam@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1995-07-08',
            'sexo' => 'F',
        ]);
        Persona::create([
            'nombre' => 'Holly',
            'apellido_paterno' => 'Smith',
            'apellido_materno' => 'Gallardo',
            'ci' => '13491874',
            'direccion' => 'Av Moscu',
            'email' => 'superholly@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1999-12-30',
            'sexo' => 'F',
        ]);
        Persona::create([
            'nombre' => 'Gustavo',
            'apellido_paterno' => 'Garcia',
            'apellido_materno' => 'Mamani',
            'ci' => '13422874',
            'direccion' => 'Av Busch',
            'email' => 'gus_garcia@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1995-05-05',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Patrick',
            'apellido_paterno' => 'Mamani',
            'apellido_materno' => 'Condo',
            'ci' => '11691859',
            'direccion' => 'Av Roca y Coronado',
            'email' => 'patrick-mc@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1991-12-18',
            'sexo' => 'M',
        ]);
        Persona::create([
            'nombre' => 'Maria',
            'apellido_paterno' => 'Gallardo',
            'apellido_materno' => 'Lopez',
            'ci' => '13791821',
            'direccion' => 'Doble via la guardia',
            'email' => 'gallardo_lopezmaria@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1990-01-01',
            'sexo' => 'F',
        ]);
        Persona::create([
            'nombre' => 'Cristhian',
            'apellido_paterno' => 'Paredes',
            'apellido_materno' => 'Paz',
            'ci' => '1828737',
            'direccion' => 'Plan 3000',
            'email' => 'Crithian_Paz@gmail.com',
            'celular' => '77777777',
            'fecha_de_nacimiento' => '1990-05-22',
            'sexo' => 'M',
        ]);
    }

    /*function fecha_aleatoria($formato = "Y-m-d", $limiteInferior = "1980-01-01", $limiteSuperior = "2004-12-30"){
        $milisegundosLimiteInferior = strtotime($limiteInferior);
        $milisegundosLimiteSuperior = strtotime($limiteSuperior);
    
        $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
    
        return date($formato, $milisegundosAleatorios);
    }*/
}
