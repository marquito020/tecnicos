<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Persona;
use App\Models\User;
use App\Models\Worker;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tecnicos'] = Tecnico::paginate(6);
        return view('tecnicos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Requiere */
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'ci' => 'required|string|max:8',
            'celular' => 'required|string|max:9',
            'email' => 'required|string|max:100',
            'fecha_de_nacimiento' => 'required|date',
            'profesion' => 'required|string|max:100',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        //
        $persona = Persona::create([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email'            => $request->email,
            'direccion'        => $request->direccion,
            'celular'          => $request->celular,
            'fecha_de_nacimiento' => $request->fecha_de_nacimiento,
            'sexo'             => $request->sexo,
            'ci'               => $request->ci,
        ]);

        Tecnico::create([
            'id'        => $persona->id,
            'profesion' => $request->profesion,
        ]);

        User::create([
            'email'          => $request->email,
            'password'       => bcrypt($request->ci),
            'id_persona'     => $persona->id,
            'id_rol'         => 4,
            'enabled'        => true,
        ])->assignRole('tecnico');

        return redirect('tecnicos')->with('Mensaje', 'Tecnico agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnico $tecnico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tecnico = Tecnico::findOrFail($id);
        $persona = Persona::findOrFail($id);
        $user = User::findOrFail($id);

        $tecnico->delete();
        $persona->delete();
        $user->delete();

        return redirect('tecnicos')->with('Mensaje', 'Tecnico eliminado con exito');
    }
}
