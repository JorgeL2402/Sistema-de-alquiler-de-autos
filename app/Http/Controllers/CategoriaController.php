<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        foreach ($categorias as $categoria) {
            $categoria->created_at = Carbon::now();
        }
        return view('lista-categorias', compact('categorias'));
    }

    public function create()
    {
        return view('crear-categoria');
    }

    public function store(Request $request)
{
    $request->validate([
        'categoria' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'estado' => 'required|string|max:255',
    ]);

    $categoria = new Categoria();
    $categoria->categoria = $request->input('categoria');
    $categoria->descripcion = $request->input('descripcion');
    $categoria->estado = $request->input('estado');
    $categoria->save();

    return redirect()->route('lista-categorias');
}


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
