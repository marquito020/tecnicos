<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


/* use worker */
use App\Models\Worker;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['asistencias'] = Asistencia::paginate(6);
        return view('asistencias.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('asistencias.form');
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
        /* dd($request->all()); */
        Asistencia::create($request->all());
        return redirect('asistencia')->with('Mensaje', 'Asistencia agregado con exito');
        /* marcar entrada */
        $asistencia = Asistencia::create([
            'id' => $request->id,
            'fecha' => $request->fecha,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'id_trabajador' => $request->id_trabajador,
        ]);
        return redirect('asistencia')->with('Mensaje', 'Asistencia agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /* dd($asistencia); */
        $asistencia = Asistencia::findOrFail($id);
        return view('asistencias.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        /* Recuperando datos de asistencia */
        $asistencia = Asistencia::findOrFail($id);
        /* Redifige al formulario */
        return view('asistencias.form', compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosAsistencia = request()->except(['_token', '_method']);
        Asistencia::where('id', '=', $id)->update($datosAsistencia);
        $asistencia = Asistencia::findOrFail($id);
        return redirect('asistencias')->with('Mensaje', 'Asistencia modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        /* Elimina el Asistencia con el id */
        Asistencia::destroy($id);
        return redirect('asistencia')->with('asistencia', 'Asistencia eliminado con exito');
    }
}
