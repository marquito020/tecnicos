<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;


/* Use asistencia */
use App\Models\Asistencia;
use App\Models\Tecnico;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }


    public function marcado()
    {
        /* $user = Auth::user();
        $worker = Worker::where('id', $user->id)->first();
        $asistencia = Asistencia::where('id_trabajador', $worker->id)->where('fecha', date('Y-m-d'))->first();
        if($asistencia){
            $asistencia->hora_fin = date('H:i:s');
            $asistencia->save();
        }else{
            $asistencia = new Asistencia();
            $asistencia->id_trabajador = $worker->id;
            $asistencia->fecha = date('Y-m-d');
            $asistencia->hora_inicio = date('H:i:s');
            $asistencia->save();
        } */
        return view('marcado');
    }


    public function marcarEntrada(Request $request)
    {
        /* dd($marcar_turno); */
        /* $user = Auth::user()->id;
        $trabajador = Worker::where('id', $user)->first();
        $marcar_turno->id_trabajador = $trabajador->id;
        $marcar_turno->fecha = date('Y-m-d');
        $marcar_turno->hora_inicio = date('H:i:s');
        $marcar_turno->save(); */

        /* Validacion */
        /* Campos requeridos */
        $campos = [
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'id_tecnico' => 'required',
        ];
        /* dd($request->all()); */
        /* Mensajes de error */
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        /* Validacion */
        $this->validate($request, $campos, $mensaje);

        Asistencia::create([
            'id_tecnico' => $request->id_tecnico,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
        ]);

        Tecnico::where('id', $request->id_tecnico)->update([
            'estado' => 'En servicio',
            'latitude' => $request->lat,
            'longitude' => $request->lng,
        ]);
        return redirect()->Route('marcado')->with('status', "Has marcado tu entrada");
    }

    public function marcarSalida(Request $request, $id)
    {
        /* dd($marcado); */
        /* Update */
        Asistencia::where('id', '=', $id)->update([
            'hora_fin' => $request->hora_fin,
            'latitude_final' => $request->lat,
            'longitude_final' => $request->lng,
        ]);

        Tecnico::where('id', $request->id_tecnico)->update([
            'estado' => 'Fuera de servicio',
            'latitude' => $request->lat,
            'longitude' => $request->lng,
        ]);
        return redirect()->Route('marcado')->with('status', "Has marcado tu salida");
    }
}
