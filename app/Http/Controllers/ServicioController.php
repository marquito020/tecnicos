<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['servicios'] = Servicio::paginate(6);
        return view('servicios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servicios.create');
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
        $campos = [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'precio' => 'required|numeric',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosServicio = request()->except('_token');
        Servicio::insert($datosServicio);
        return redirect('servicios')->with('mensaje', 'Servicio agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
        $servicio = Servicio::findOrFail($servicio->id);
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
        /* restriccion */
        $campos = [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'precio' => 'required|numeric',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosServicio = request()->except(['_token', '_method']);
        Servicio::where('id', '=', $servicio->id)->update($datosServicio);
        return redirect('servicios')->with('mensaje', 'Servicio modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
        /* Destroy Servicio */
        Servicio::destroy($servicio->id);
        return redirect('servicios')->with('mensaje', 'Servicio eliminado con exito');
    }
}
