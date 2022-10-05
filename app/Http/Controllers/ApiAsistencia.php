<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

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
        ->where('fecha',null)
        ->first();
        if ($datosAsistencia == null) {
            $datosAsistencia = Asistencia::create([
                'id_tecnico' => $request->user,
                'fecha' => date('Y-m-d'),
                'hora_inicio' => date('H:i:s'),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
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
            return response()->json([
                'datosAsistencia' => null,
                'message' => 'Asistencia registrada'
            ]);
        }
    }
}
