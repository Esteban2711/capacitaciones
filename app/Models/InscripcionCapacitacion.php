<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionCapacitacion extends Model
{
    use HasFactory;

    protected $table = 'capacitacion_usuario';

    protected $fillable = [
        'usuario_id',
        'capacitacion_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function capacitacion()
    {
        return $this->belongsTo(Capacitacion::class);
    }
}