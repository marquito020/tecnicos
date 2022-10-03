<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioCliente;
/* Auth */
use Illuminate\Support\Facades\Auth;
/* servicio */
use App\Models\Servicio;
/* cliente */
use App\Models\Cliente;

class CrearFormularioClienteController extends Controller
{
    public function index()
    {
        //
        $user = Auth::user();
        $datos['formularios'] = FormularioCliente::where('id_cliente', $user->id_persona)->paginate(6);
        return view('cliente_crea_formularios.index', $datos);
    }

    public function create()
    {
        //
        /* servicio */
        $datos['servicios'] = Servicio::all();
        /* cliente */
        $datos['clientes'] = Cliente::all();
        return view('cliente_crea_formularios.create', $datos);
    }

    public function store(Request $request)
    {
        //
        /* dd($request); */
        /* restriccion */
        $campos = [
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

        return redirect('cliente_crea_formularios')->with('Mensaje', 'Formulario agregado con exito');
    }
}
