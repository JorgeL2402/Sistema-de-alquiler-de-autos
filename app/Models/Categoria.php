<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['categoria', 'descripcion', 'estado'];

    // Asignar automáticamente la fecha en la creación del modelo
    public static function boot()
    {
        parent::boot();

        static::creating(function ($categoria) {
            $categoria->created_at = now()->toDateString();
        });
    }
}
