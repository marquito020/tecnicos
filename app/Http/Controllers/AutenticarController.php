<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Registro Request */
/* use App\Http\Requests\RegistrarRequest; */
/* usuario */
use App\Models\User;
/* Auth */
use Illuminate\Support\Facades\Auth;
/* Carbon */
use Carbon\Carbon;
/* Acces token */
use Illuminate\Support\Facades\Hash;
/* Validator */
use Illuminate\Support\Facades\Validator;
/* Persona */
use App\Models\Persona;
/* Tecnico */
use App\Models\Tecnico;

class AutenticarController extends Controller
{

    public function login(Request $request)
    {
        /* try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        } */
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }

        $token = $user->createToken("API TOKEN")->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);

        return response()->json([
            'user' => $user,
            'name' => $user->name,
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $token
        ], 200)->withCookie($cookie);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    //
    public function register(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return response()->json(['mensaje' => 'Usuario registrado correctamente']);
    }

    public function datos(Request $request)
    {
        /* tomar datos de un usuario */
        $datosUsuario = User::where('id', $request->user()->id)->first();
        $datosPersona = Persona::where('id', $datosUsuario->id_persona)->first();
        $datosTecnico = Tecnico::where('id', $datosPersona->id)->first();
        return response()->json([
            'status' => true,
            'message' => 'Datos del usuario',
            'usuario' => $datosUsuario,
            'persona' => $datosPersona,
            'tecnico' => $datosTecnico
        ], 200);
    }
}
