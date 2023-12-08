<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalNewAutomovil extends Model
{
    use HasFactory;

    protected $table = 'modalnewautomovil';

    protected $fillable = [
        'categoria_id',
        'marca',
        'modelo',
        'informacion_vehiculo',
        'cantidad',
        'estado',
        'unidades_disponibles',
        'tarifa_diaria',
        'descripcion',
        'miniatura',
        'imagenes',
    ];

    protected $casts = [
        'imagenes' => 'array',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

// En tu modelo ModalNewAutomovil
// En tu modelo ModalNewAutomovil
public function marca()
{
    return $this->belongsTo(Marca::class, 'marca');
}


}
