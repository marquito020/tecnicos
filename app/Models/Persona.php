<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'ci',
        'direccion',
        'celular',
        'email',
        'fecha_de_nacimiento',
        'sexo',
    ];

    /* cliente */
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id');
    }

    /* administrativo */
    public function administrativo()
    {
        return $this->hasOne(Administrativo::class, 'id');
    }

    /* tecnico */
    public function tecnico()
    {
        return $this->hasOne(Tecnico::class, 'id');
    }
}
