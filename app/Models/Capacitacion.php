<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;

    protected $table = 'capacitaciones';

    protected $fillable = [
        'nombre',
        'fecha',
        'hora',
        'cupo'
    ];

    public function inscripciones()
    {
        return $this->hasMany(InscripcionCapacitacion::class);
    }
}