<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;

/* Persona */
use App\Models\Persona;
/* User */
use App\Models\User;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['administrativos'] = Administrativo::paginate(6);
        return view('administrativos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /* restriccion */
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

        Administrativo::create([
            'id'        => $persona->id,
            'profesion' => $request->profesion,
        ]);

        User::create([
            'email'     => $request->email,
            'password'  => bcrypt($request->ci),
            'id_persona' => $persona->id,
            'id_rol'    => 2,
            'enabled'   => true,
        ])->assignRole('admin');

        return redirect('administrativos')->with('mensaje', 'Administrativo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function show(Administrativo $administrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrativo $administrativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrativo $administrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrativo  $administrativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrativo $administrativo)
    {
        //
    }
}