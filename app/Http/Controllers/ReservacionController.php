<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModalNewAutomovil;

class ReservacionController extends Controller
{
   // ReservacionController.php

public function reservar($id)
{
    $automovil = ModalNewAutomovil::find($id);

    return response()->json(['automovil' => $automovil]);
}

}