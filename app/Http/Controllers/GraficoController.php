<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function mes(Request $request)
    {
        return view('graficos/mes');
    }
    public function ano(Request $request)
    {
        $meses = [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho'
         ];
        return view('graficos/ano', compact('meses'));
    }
}
