<!-- @extends('layouts.app')
@section('asistencia', 'is-active')
@section('content') -->
<!-- Form turno trabajador -->

<!-- <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Turno</div>
                <div class="card-body">
                    <form method="" action="{{ route('asistencia.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="id_trabajador" class="col-md-4 col-form-label text-md-right">Trabajador</label>
                            <div class="col-md-6">
                                <select name="id_trabajador" id="id_trabajador" class="form-control">
                                    <option value=" {{ Auth::user()->persona->id }}"> {{ Auth::user()->persona->nombre }}</option>
                                </select>
                            </div>
                        </div>
                        <br> -->



                        <!-- Marcado -->
                        <!-- @if (Auth()->user()->id_rol == 1)
                        @else -->

                        <!-- @php
                        $marcado = DB::table('asistencias')
                        ->where('id_trabajador', Auth::user()->persona->id)
                        ->where('fecha', date('Y-m-d'))
                        ->where('hora_fin', null)
                        ->first();
                        @endphp
 -->
                       <!--  @if (is_null($marcado))
                        <div>
                            <form action="{{ route('marcarEntrada') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_trabajador" value="{{ Auth::user()->persona->id }}">
                                <input type="hidden" name="tipo" value="entrada">
                                <input type="hidden" name="fecha" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="hora_inicio" value="{{ date('H:i:s') }}">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    marcar horario de entrada
                                </button>
                            </form>

                        </div>
                        @endif

                        <div>
                            @if (is_null($marcado))
                            @else
                            <label for="">Usted Marco su entrada a las: {{ $marcado->hora_inicio }}</label>
                            <form action="{{ route('marcarSalida', $marcado->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    marcar horario de salida
                                </button>
                                @endif
                        </div> -->
                        <!-- @endif -->
                        <!-- Marcado -->

                        <!-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
<!--     @endsection -->