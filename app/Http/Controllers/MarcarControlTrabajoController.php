<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlTrabajo;
/* Formulario */
use App\Models\FormularioCliente;
use App\Models\Tecnico;
/* Trabajo Asignado */
use App\Models\TrabajoAsignado;

class MarcarControlTrabajoController extends Controller
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
        $trabajo_asignados = TrabajoAsignado::where('id_tecnico', '=', auth()->user()->id)->get();
        return view('marcar_control_trabajos.index', compact('trabajo_asignados'));
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
        /* dd($request); */
        /* campos requeridos */
        $campos = [
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'id_trabajo_asignado' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ];
        /* mensaje */
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        if ($request->distancia > 5) {
            return redirect('marcar_control_trabajos')->with('mensaje', 'No se puede marcar el control de trabajo, porque la distancia es mayor a 9 metros');
        } else {

            $datosControlTrabajo = request()->except('_token');
            ControlTrabajo::create([
                'fecha' => $datosControlTrabajo['fecha'],
                'hora_inicio' => $datosControlTrabajo['hora_inicio'],
                'id_trabajo_asignado' => $datosControlTrabajo['id_trabajo_asignado'],
                'latitude_inicio' => $datosControlTrabajo['lat'],
                'longitude_inicio' => $datosControlTrabajo['lng'],
            ]);
            /* Update Formulario Cliente */
            $trabajo = TrabajoAsignado::findOrFail($datosControlTrabajo['id_trabajo_asignado']);
            $formulario = FormularioCliente::findOrFail($trabajo->id_formulario_cliente);
            FormularioCliente::where('id', '=', $formulario->id)->update(['estado' => 'En proceso']);

            Tecnico::where('id', '=', auth()->user()->id)->update(['estado' => 'En Proceso']);
            Tecnico::where('id', '=', auth()->user()->id)->update(['latitude' => $datosControlTrabajo['lat']]);
            Tecnico::where('id', '=', auth()->user()->id)->update(['longitude' => $datosControlTrabajo['lng']]);

            return redirect('marcar_control_trabajos')->with('mensaje', 'Control de trabajo agregado con exito');
        }
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
        $marcar_control_trabajos = TrabajoAsignado::findOrFail($id);
        $coordenasCliente = FormularioCliente::findOrFail($marcar_control_trabajos->formularioCliente->id);
        return view('marcar_control_trabajos.show', compact('marcar_control_trabajos', 'coordenasCliente'));
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
    public function update(Request $request, $id)
    {
        //
        /* dd($request); */
        /* campos requeridos */
        $campos = [
            'hora_fin' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ];
        /* mensaje */
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosControlTrabajo = request()->except(['_token', '_method']);
        ControlTrabajo::where('id', '=', $id)->update(
            [
                'hora_fin' => $datosControlTrabajo['hora_fin'],
                'latitude_fin' => $datosControlTrabajo['lat'],
                'longitude_fin' => $datosControlTrabajo['lng'],
            ]
        );
        /* Update Formulario Cliente */
        $trabajo = TrabajoAsignado::findOrFail($datosControlTrabajo['id_trabajo_asignado']);
        $formulario = FormularioCliente::findOrFail($trabajo->id_formulario_cliente);
        FormularioCliente::where('id', '=', $formulario->id)->update(['estado' => 'Realizado']);

        /* Update Formulario Cliente */
        Tecnico::where('id', '=', auth()->user()->id)->update(['estado' => 'Disponible']);
        Tecnico::where('id', '=', auth()->user()->id)->update(['latitude' => $datosControlTrabajo['lat']]);
        Tecnico::where('id', '=', auth()->user()->id)->update(['longitude' => $datosControlTrabajo['lng']]);

        return redirect('marcar_control_trabajos')->with('mensaje', 'Control de trabajo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ControlTrabajo  $controlTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ControlTrabajo $controlTrabajo)
    {
        //
    }
}
