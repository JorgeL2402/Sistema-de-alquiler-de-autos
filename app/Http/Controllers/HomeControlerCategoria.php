<?php

namespace App\Http\Controllers;
// En HomeControlerCategoria.php

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Carbon\Carbon;

class HomeControlerCategoria extends Controller
{
// En HomeControlerCategoria.php

public function index()
{
    $categorias = Categoria::all();
    foreach ($categorias as $categoria) {
        $categoria->created_at = Carbon::now();
    }

    return view('welcome', compact('categorias'));
}
}
