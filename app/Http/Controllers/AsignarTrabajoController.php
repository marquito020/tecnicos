<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* TrabajoAsignado */
use App\Models\TrabajoAsignado;
/* Formulario CLiente */
use App\Models\FormularioCliente;
/* Tecnico */
use App\Models\Tecnico;
/* Persona */
use App\Models\Persona;


class AsignarTrabajoController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* formulario */
        $formularios = FormularioCliente::get();
        /* tecnico */
        $tecnicos = Tecnico::get();
        /* trabajo asignado */
        $trabajos = TrabajoAsignado::get();
        return view('asignar_trabajos.index', compact('formularios', 'tecnicos', 'trabajos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        /* dd($request); */
        /* requerido */
        $campos = [
            'estado' => 'required|string|max:100',
            'id_formulario_cliente' => 'required|string|max:100',
            'id_tecnico' => 'required|string|max:100',
            'id_administrativo' => 'required|string|max:100',
        ];
        /* mensaje */
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        /* validacion */
        $this->validate($request, $campos, $mensaje);
        /* dd($request); */
        /* insertar */
        $datosTrabajo = request()->except('_token');
        TrabajoAsignado::create($datosTrabajo);
        return redirect('asignar_trabajos')->with('mensaje', 'Trabajo Asignado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrabajoAsignado  $trabajoAsignado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $formulario = FormularioCliente::findOrFail($id);
        /* tecnico */
        $tecnicos = Tecnico::where('estado', 'En servicio')->get();
        /* persona */
        $personas = Persona::get();
        /* dd($tecnicos); */
        return view('asignar_trabajos.show', compact('formulario', 'tecnicos','personas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrabajoAsignado  $trabajoAsignado
     * @return \Illuminate\Http\Response
     */
    public function edit(TrabajoAsignado $trabajoAsignado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrabajoAsignado  $trabajoAsignado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrabajoAsignado $trabajoAsignado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrabajoAsignado  $trabajoAsignado
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrabajoAsignado $trabajoAsignado)
    {
        //
    }
}
