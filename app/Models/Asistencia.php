<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'asistencias';

    protected $fillable = [
        'id_trabajador',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'latitude',
        'longitude',
        'latitude_final',
        'longitude_final',
        'id_tecnico',
        'id_administrativo',
    ];

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'id_tecnico');
    }

    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'id_administrativo');
    }

}
