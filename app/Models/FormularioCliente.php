<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioCliente extends Model
{
    use HasFactory;

    protected $table = 'formulario_clientes';

    protected $fillable = [
        'descripcion',
        'fecha',
        'hora',
        'estado',
        'latitude',
        'longitude',
        'id_servicio',
        'id_cliente',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function trabajo_asignado()
    {
        return $this->hasOne(TrabajoAsignado::class, 'id_formulario_cliente');
    }
}
