<?php
namespace App\Http\Controllers;

use App\Models\ModalNewAutomovil;
use App\Models\Categoria;
use App\Models\Marca;

class NavegacionController extends Controller
{
    public function obtenerCategoriasMarcasYAutos()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $autos = ModalNewAutomovil::with('categoria')->get();
    
        return view('welcome', compact('categorias', 'marcas', 'autos'));
    }
    // NavegacionController.php

// NavegacionController.php

// En tu controlador
public function mostrarDetalleAuto($id)
{
    $auto = ModalNewAutomovil::findOrFail($id);
    $categorias = Categoria::all(); // Puedes ajustar esto según tus necesidades
    $marcas = Marca::all(); // Puedes ajustar esto según tus necesidades

    return view('detalle-auto', compact('auto', 'categorias', 'marcas'));
}

    
}