<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;
    protected $table = 'tecnicos';

    protected $fillable  = ['id', 'profesion', 'estado', 'latitude', 'longitude'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }
}
