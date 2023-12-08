<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nombre', 'estado'];

    // Asignar automáticamente la fecha y hora en la creación del modelo
    public static function boot()
    {
        parent::boot();

        static::creating(function ($marca) {
            $marca->created_at = $marca->freshTimestamp();
        });
    }
}
