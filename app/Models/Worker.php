<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers';
    protected $fillable = ['id',];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }
}
