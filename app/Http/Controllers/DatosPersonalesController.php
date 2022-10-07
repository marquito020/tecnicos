<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* user */
use App\Models\User;
/* Auth */
use Illuminate\Support\Facades\Auth;

class DatosPersonalesController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('datos_personales', compact('user'));
    }
}
