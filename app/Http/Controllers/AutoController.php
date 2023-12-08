<?php

namespace App\Http\Controllers;

use App\Models\ModalnewAutomovil;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function index()
    {
        $autos = ModalnewAutomovil::all();

        return view('welcome', compact('autos'));
    }
}
