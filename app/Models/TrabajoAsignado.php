<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoAsignado extends Model
{
    use HasFactory;

    protected $table = 'trabajo_asignados';

    protected $fillable = [
        'estado',
        'id_tecnico',
        'id_formulario_cliente',
        'id_administrativo',
    ];

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'id_tecnico');
    }

    public function formularioCliente()
    {
        return $this->belongsTo(FormularioCliente::class, 'id_formulario_cliente');
    }

    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'id_administrativo');
    }
}
