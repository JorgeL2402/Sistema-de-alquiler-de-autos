<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Carbon\Carbon; // Importa la clase Carbon para trabajar con fechas
class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
         // Asignar la fecha de creación actual a cada marca
    foreach ($marcas as $marca) {
        $marca->created_at = Carbon::now();
    }
        return view('lista-marcas', compact('marcas'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           // Mostrar el formulario para crear una nueva marca
           return view('crear-marca');
    }

    /**
     * Store a newly created resource in storage.
     */
   // En tu controlador
public function store(Request $request)
{
    // Validación de datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'estado' => 'required|string|max:255',
    ]);

    // Crear una nueva instancia del modelo Marca con los datos del formulario
    $marca = new Marca();
    $marca->nombre = $request->input('nombre');
    $marca->estado = $request->input('estado');
    $marca->save();

    // Redirigir a la lista de marcas o a donde desees
    return redirect()->route('lista-marcas');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
