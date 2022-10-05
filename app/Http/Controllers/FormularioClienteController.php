<?php

namespace App\Http\Controllers;

use App\Models\FormularioCliente;
use Illuminate\Http\Request;

/* Servicio */
use App\Models\Servicio;
/* Cliente */
use App\Models\Cliente;
/* Auth */
use Illuminate\Support\Facades\Auth;

class FormularioClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['formularios'] = FormularioCliente::paginate(6);
        return view('formularios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /* servicio */
        $datos['servicios'] = Servicio::all();
        /* cliente */
        $datos['clientes'] = Cliente::all();
        return view('formularios.create', $datos);
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
        /* restriccion */
        $campos = [
            'id_cliente' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|string|max:100',
            'lat' => 'required|string|max:100',
            'lng' => 'required|string|max:100',
            'id_servicio' => 'required|integer',
            'id_cliente' => 'required|integer',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosFormulario = request()->except('_token');
        /* crear formulario */
        FormularioCliente::create([
            'descripcion' => $datosFormulario['descripcion'],
            'fecha' => $datosFormulario['fecha'],
            'hora' => $datosFormulario['hora'],
            'estado' => $datosFormulario['estado'],
            'id_servicio' => $datosFormulario['id_servicio'],
            'id_cliente' => $datosFormulario['id_cliente'],
            'latitude' => $datosFormulario['lat'],
            'longitude' => $datosFormulario['lng'],
        ]);

        return redirect('formularioClientes')->with('Mensaje', 'Formulario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormularioCliente  $formularioCliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /* $formularioCliente = FormularioCliente::findOrFail($id);
        return view('formularios.show', compact('formularioCliente')); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormularioCliente  $formularioCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(FormularioCliente $formularioCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormularioCliente  $formularioCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormularioCliente $formularioCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormularioCliente  $formularioCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        /* eliminar */
        FormularioCliente::destroy($id);
        return redirect('formularioCliente');
    }
}
