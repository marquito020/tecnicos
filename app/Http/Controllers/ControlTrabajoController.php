<?php

namespace App\Http\Controllers;

use App\Models\ControlTrabajo;
use Illuminate\Http\Request;

/* Formulario Cliente */
use App\Models\FormularioCliente;

class ControlTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['control_trabajos'] = ControlTrabajo::paginate(6);
        return view('control_trabajos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('control_trabajos.create');
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
        /* campos requeridos */
        $campos = [
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'id_trabajo_asignado' => 'required',
            'latitude_inicio' => 'required',
            'longitude_inicio' => 'required',
        ];
        /* mensaje */
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosControlTrabajo = request()->except('_token');
        ControlTrabajo::insert($datosControlTrabajo);
        /* Update Formulario Cliente */
        $id_trabajo_asignado = $request->get('id_trabajo_asignado');
        $formulario_cliente = FormularioCliente::findOrFail($id_trabajo_asignado);
        return redirect('control_trabajos')->with('mensaje', 'Control de trabajo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ControlTrabajo  $controlTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $control_trabajo = ControlTrabajo::findOrFail($id);
        return view('control_trabajos.show', compact('control_trabajo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ControlTrabajo  $controlTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(ControlTrabajo $controlTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ControlTrabajo  $controlTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ControlTrabajo $controlTrabajo)
    {
        //
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ControlTrabajo  $controlTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($ido)
    {
        //
        $control_trabajo = ControlTrabajo::findOrFail($ido);
        ControlTrabajo::destroy($ido);
        return redirect('control_trabajos')->with('mensaje', 'Control de trabajo eliminado con exito');
    }
}
