<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModalNewAutomovil;
use App\Models\Categoria;
use App\Models\Marca;
use Barryvdh\DomPDF\Facade as PDF; // Asegúrate de tener esta línea

use Illuminate\Support\Facades\DB;

class CatalogoAutomovilesController extends Controller
{
    public function index()
    {
        $autos = ModalNewAutomovil::with('categoria', 'marca')->paginate(10);
        $categorias = Categoria::pluck('categoria', 'id');
        $marcas = Marca::pluck('nombre', 'id');
    
        return view('catalogo-automoviles', compact('autos', 'categorias', 'marcas'));
    }

    public function generarReporteAutosDisponibles()
    {
        $autosDisponibles = ModalNewAutomovil::where('estado', 'Activo')->get();
        
        $pdf = PDF::loadView('reportes.autos_disponibles', compact('autosDisponibles'));
        
        return $pdf->download('reporte_autos_disponibles.pdf');
    }
    
    public function detalles($id)
    {
        $automovil = ModalNewAutomovil::find($id);
    
        return view('detalles-automovil', compact('automovil'));
    }
    
    public function edit($id)
    {
        $automovil = ModalNewAutomovil::with('categoria', 'marca')->find($id);
        $categorias = Categoria::pluck('categoria', 'id');
        $marcas = Marca::pluck('nombre', 'id');
    
        return view('editar-automovil', compact('automovil', 'categorias', 'marcas'));
    }
    
    public function create()
    {
        $categorias = Categoria::pluck('categoria', 'id');
        $marcas = Marca::pluck('nombre', 'id');
    
        return view('crear-automovil', compact('categorias', 'marcas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            // ... (tus reglas de validación aquí)
        ], [
            'imagenes.size' => 'Debe seleccionar exactamente 4 imágenes.',
        ]);
    
        // Guardar miniatura localmente
        $miniaturaPath = null;
        if ($request->hasFile('miniatura')) {
            $miniaturaPath = $request->file('miniatura')->store('miniaturas', 'public');
        }
    
        // Guardar imágenes localmente
        $imagenesPaths = [];
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $imagenesPaths[] = $imagen->store('imagenes', 'public');
            }
        }
    
        $request->merge([
            'miniatura' => $miniaturaPath ? basename($miniaturaPath) : null,
            'imagenes' => $imagenesPaths ? json_encode($imagenesPaths) : null,
            'marca' => $request->input('marca'), // Ajustado para almacenar el nombre de la marca
        ]);
    
        // Intenta actualizar o crear usando una transacción
        try {
            DB::beginTransaction();
    
            ModalNewAutomovil::updateOrCreate(
                ['id' => $request->input('id')],
                $request->except(['_token', 'id'])
            );
    
            DB::commit();
    
            return redirect()->route('catalogo-automoviles')->with('success', 'Automóvil guardado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
    
            return redirect()->back()->with('error', 'Error al guardar el automóvil. Por favor, inténtelo de nuevo.');
        }
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:0',
            'estado' => 'required|in:Inactivo,Activo',
            'unidades_disponibles' => 'required|integer|min:0',
            'tarifa_diaria' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
        ]);

        try {
            $automovil = ModalNewAutomovil::findOrFail($id);
            $automovil->update($request->only(['cantidad', 'estado', 'unidades_disponibles', 'tarifa_diaria', 'descripcion']));

            return redirect()->route('catalogo-automoviles')->with('success', 'Automóvil actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar el automóvil. Por favor, inténtelo de nuevo.');
        }
    }
}
