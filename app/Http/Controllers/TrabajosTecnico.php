<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* trabajos asignados */
use App\Models\TrabajoAsignado;

class TrabajosTecnico extends Controller
{
    //
    /* index */
    public function index()
    {
        //
        $id = auth()->user()->id;
        $datos['trabajo_asignados'] = TrabajoAsignado::where('id_tecnico', $id)->paginate(6);
        return view('trabajos_tecnico.index', $datos);
    }
}
