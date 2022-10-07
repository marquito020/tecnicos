<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\ControlTrabajo;
use Illuminate\Http\Request;
/* tecnico */
use App\Models\Tecnico;
/* persona */
use App\Models\Persona;
/* formulario cliente */
use App\Models\FormularioCliente;
/* trabajo asignado */
use App\Models\TrabajoAsignado;
/* Cliente  */
use App\Models\Cliente;


class ApiAsistencia extends Controller
{
    public function datosAsistencia(Request $request)
    {
        /* $id_asistencia = null;
        $marcado = Asistencia::where('id_tecnico', $request->id)
            ->where('fecha', date('Y-m-d'))
            ->where('hora_fin', null)
            ->first();

        if ($marcado == null) {
            $asistencia = Asistencia::create();
            $id_asistencia = $asistencia->id;
        } else {
            Asistencia::where('id', $marcado->id)
                ->update([
                    'hora_inicio' => date('H:i:s')
                ]);
        }

        return response()->json([
            'id_asistencia' => $id_asistencia
        ]); */
        $datosAsistencia = Asistencia::where('id_tecnico', $request->user)->where('hora_fin', null)->first();
        if ($datosAsistencia == null) {
            return response()->json([
                'datosAsistencia' => $datosAsistencia
            ]);
        } else {
            return response()->json([
                'datosAsistencia' => $datosAsistencia->id
            ]);
        }
    }

    public function marcarEntrada(Request $request)
    {
        $datosAsistencia = Asistencia::where('id_tecnico', $request->user)->where('hora_fin', null)
            ->where('fecha', null)
            ->first();
        if ($datosAsistencia == null) {
            $datosAsistencia = Asistencia::create([
                'id_tecnico' => $request->user,
                'fecha' => date('Y-m-d'),
                'hora_inicio' => date('H:i:s'),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);
            Tecnico::where('id', $request->user)->update([
                'estado' => 'En servicio',
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
            return response()->json([
                'datosAsistencia' => $datosAsistencia,
                'message' => 'Asistencia registrada'
            ]);
        } else {
            return response()->json([
                'datosAsistencia' => $datosAsistencia
            ]);
        }
    }

    public function marcarSalida(Request $request)
    {
        $datosAsistencia = Asistencia::where('id_tecnico', $request->user)->where('hora_fin', null)->first();
        if ($datosAsistencia == null) {
            return response()->json([
                'datosAsistencia' => $datosAsistencia
            ]);
        } else {
            Asistencia::where('id', $datosAsistencia->id)
                ->update([
                    'hora_fin' => date('H:i:s'),
                    'latitude_final' => $request->latitude,
                    'longitude_final' => $request->longitude
                ]);
            Tecnico::where('id', $request->user)->update([
                'estado' => 'Fuera de servicio',
                'latitude' => $request->latitude,
                'longitude' => $request->latitude,
            ]);
            return response()->json([
                'datosAsistencia' => null,
                'message' => 'Asistencia registrada'
            ]);
        }
    }

    public function datos_asistencia_total(Request $request)
    {
        $datosAsistencia = Asistencia::where('id_tecnico', $request->user)->get();
        if ($datosAsistencia == null) {
            return response()->json([
                'datosAsistencia' => $datosAsistencia,
                'message' => 'No hay datos'
            ]);
        } else {
            return response()->json([
                'datosAsistencia' => $datosAsistencia
            ]);
        }
    }

    public function trabajo_asignado(Request $request)
    {
        $trabajoAsignado = TrabajoAsignado::where('id', $request->id_trabajo)->first();
        /* $datos = Asistencia::where('id_tecnico', $request->user)->first(); */
        if ($trabajoAsignado == null /* || $trabajoAsignado->estado == 'Finalizado' */) {
            return response()->json([
                /* 'trabajoAsignado' => $trabajoAsignado, */
                'message' => 'No hay trabajos asignados'
            ]);
        } else {
            $formulario = FormularioCliente::where('id', $request->id_trabajo)->first();
            return response()->json([
                'trabajoAsignado' => $trabajoAsignado,
                'formulario' => $formulario,
            ]);
        }
    }

    public function datos_trabajos_asignados(Request $request)
    {
        $trabajoAsignado = TrabajoAsignado::where('id_tecnico', $request->user)->get();
        $formualrio = FormularioCliente::all();
        foreach ($trabajoAsignado as $trabajo) {
            foreach ($formualrio as $formulario) {
                if ($trabajo->id_formulario_cliente == $formulario->id) {
                    $trabajo->formulario = $formulario;
                }
            }
        }
        if ($trabajoAsignado == null) {
            /* return Cliente::all(); */
            return response()->json([
                'trabajoAsignado' => $trabajoAsignado,
                'message' => 'No hay datos'
            ]);
        } else {
            return $trabajoAsignado;
        }
    }



    public function distancia($latiude1, $longitude1, $latitude2, $longitude2)
    {
        $earth_radius = 6371;

        $dLat = deg2rad($latitude2 - $latiude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latiude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $earth_radius * $c;

        return $d;
    }


    public function trabajo_asignado_inicio(Request $request)
    {
        $trabajoAsignado = TrabajoAsignado::where('id', $request->id_trabajo)->latest()->first();
        $controlTrabajo = ControlTrabajo::where('id_trabajo_asignado', $trabajoAsignado->id)
            ->where('fecha', null)->latest()->first();
        if ($controlTrabajo == null) {


            $formualrio = FormularioCliente::where('id', $trabajoAsignado->id_formulario_cliente)->latest()->first();
            $latitude1 = $formualrio->latitude;
            $longitude1 = $formualrio->longitude;
            $latitude2 = $request->latitude;
            $longitude2 = $request->longitude;
            $distancia = $this->distancia($latitude1, $longitude1, $latitude2, $longitude2);

            if ($distancia <= 0.5) {

                $controlTrabajo = ControlTrabajo::create([
                    'id_trabajo_asignado' => $trabajoAsignado->id,
                    'fecha' => date('Y-m-d'),
                    'hora_inicio' => date('H:i:s'),
                    'latitude_inicio' => $request->latitude,
                    'longitude_inicio' => $request->longitude,
                ]);
                Tecnico::where('id', $request->user)->update([
                    'estado' => 'En proceso',
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
                FormularioCliente::where('id', $trabajoAsignado->id_formulario_cliente)->update([
                    'estado' => 'En proceso'
                ]);
                return response()->json([
                    'controlTrabajo' => $controlTrabajo,
                    'message' => 'Asistencia registrada'
                ]);
            } else {
                return response()->json([
                    'controlTrabajo' => $controlTrabajo,
                    'message' => 'No se encuentra en el lugar'
                ]);
            }
        } else {
            return response()->json([
                'controlTrabajo' => $controlTrabajo,
                'message' => 'Ya se inicio el trabajo'
            ]);
        }
    }

    public function trabajo_asignado_fin(Request $request)
    {
        $trabajoAsignado = TrabajoAsignado::where('id', $request->id_trabajo)->latest()->first();
        $controlTrabajo = ControlTrabajo::where('id_trabajo_asignado', $trabajoAsignado->id)
            ->where('hora_fin', null)->latest()->first();
        if ($controlTrabajo == null) {

            return response()->json([
                'controlTrabajo' => $controlTrabajo,
                'message' => 'No hay trabajos asignados'
            ]);
        } else {


            $formualrio = FormularioCliente::where('id', $trabajoAsignado->id_formulario_cliente)->latest()->first();
            $latitude1 = $formualrio->latitude;
            $longitude1 = $formualrio->longitude;
            $latitude2 = $request->latitude;
            $longitude2 = $request->longitude;
            $distancia = $this->distancia($latitude1, $longitude1, $latitude2, $longitude2);


            if ($distancia <= 0.5) {
                ControlTrabajo::where('id', $controlTrabajo->id)
                    ->update([
                        'hora_fin' => date('H:i:s'),
                        'latitude_fin' => $request->latitude,
                        'longitude_fin' => $request->longitude,
                    ]);
                Tecnico::where('id', $request->user)->update([
                    'estado' => 'En servicio',
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
                FormularioCliente::where('id', $trabajoAsignado->id_formulario_cliente)->update([
                    'estado' => 'Realizado'
                ]);
                return response()->json([
                    'controlTrabajo' => $controlTrabajo,
                    'message' => 'Asistencia registrada'
                ]);
            } else {
                return response()->json([
                    'controlTrabajo' => $controlTrabajo,
                    'message' => 'No se encuentra en el lugar'
                ]);
            }
        }
    }
}
