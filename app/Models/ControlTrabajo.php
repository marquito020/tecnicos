<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlTrabajo extends Model
{
    use HasFactory;

    protected $table = 'control_trabajos';

    protected $fillable = [
        'id_trabajo_asignado',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'latitude_inicio',
        'longitude_inicio',
        'latitude_fin',
        'longitude_fin',
    ];

    public function trabajoAsignado()
    {
        return $this->belongsTo(TrabajoAsignado::class, 'id_trabajo_asignado');
    }
}
