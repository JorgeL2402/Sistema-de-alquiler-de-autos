<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class HomeControlerMarca extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        // dd($marcas); // Comentado para evitar detener la ejecución
        return view('welcome', compact('marcas'));
    }
}
