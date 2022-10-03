<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeTrabajo extends Model
{
    use HasFactory;

    protected $table = 'informe_trabajos';

    protected $fillable = [
        'descripcion',
        'fecha',
        'hora',
        'id_control_trabajo',
    ];

    public function controlTrabajo()
    {
        return $this->belongsTo(ControlTrabajo::class, 'id_control_trabajo');
    }
}
