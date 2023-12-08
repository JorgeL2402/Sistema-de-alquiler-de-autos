<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function index()
{
    $reservas = Reserva::all();

        return view('lista-reservas', compact('reservas'));
}

public function create()
{
    // Método para mostrar el formulario de creación de reserva
}

public function store(Request $request)
{
    // Método para almacenar una nueva reserva en la base de datos
}

public function show($id)
{
    // Método para mostrar una reserva específica
}

public function edit($id)
{
    // Método para mostrar el formulario de edición de reserva
}

public function update(Request $request, $id)
{
    // Método para actualizar una reserva existente
}

public function destroy($id)
{
    // Método para eliminar una reserva
}

}
