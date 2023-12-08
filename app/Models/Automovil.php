<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    protected $table = 'automoviles'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'fecha_creacion',
        'tipo',
        'modelo',
        'marca',
        'informacion_vehiculo',
        'cantidad',
        'estado',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}