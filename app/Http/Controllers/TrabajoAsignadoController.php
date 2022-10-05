<?php

namespace App\Http\Controllers;

use App\Models\TrabajoAsignado;
use Illuminate\Http\Request;

class TrabajoAsignadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['trabajo_asignados'] = TrabajoAsignado::paginate(6);
        /* dd($datos); */
        return view('trabajos_asignados.index', $datos);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrabajoAsignado  $trabajoAsignado
     * @return \Illuminate\Http\Response
     */
    public function show(TrabajoAsignado $trabajoAsignado)
    {
        //
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
    public function destroy($id)
    {
        //
        TrabajoAsignado::destroy($id);
        return redirect('trabajo_asignados');
    }
}
