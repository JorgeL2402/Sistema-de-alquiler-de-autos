<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\ModalNewAutomovil;
use App\Models\Marca;

class PDFController extends Controller
{
    public function index()
    {
        $autosDisponibles = ModalNewAutomovil::with('categoria', 'marca')->where('estado', 'Activo')->get();

        // Obtener todas las marcas
        $marcas = Marca::pluck('nombre', 'id');

        $data = [
            'title' => 'Reporte de Autos Disponibles',
            'autosDisponibles' => $autosDisponibles,
            'marcas' => $marcas,
        ];

        $pdf = PDF::loadView('testPDF', $data);

        return $pdf->download('reporte_autos_disponibles.pdf');
    }
}
