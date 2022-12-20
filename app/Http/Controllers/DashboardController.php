<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Financiador;
use App\Models\Participante;
use App\Models\Projecto;
use App\Models\Saida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function recuperar(Request $request)
    {
        $entradas = Entrada::all();
        $saidas = Saida::all();
        $projectos = Projecto::all();
        $financiadors = Financiador::all();
        $participantes = Participante::all();

        $data = date_create(date('d-m-Y'));$dados = array();
        $year = $request->ano ?? $data->format('Y');
        foreach ($projectos as $key => $project) {
            $tEntradas = DB::table('entradas')->where('projecto_id', $project->id)->whereYear('created_at', '=', $year)->sum('valor');
            $tSaidas = DB::table('saidas')->where('projecto_id', $project->id)->whereYear('created_at', '=', $year)->sum('valor');
            $saldo = $tEntradas - $tSaidas;
            $dados [] = [$project->acronimo, $saldo, $tSaidas, $tEntradas];
        }
        $finSoma = DB::select('SELECT financiadors.name, projectos.acronimo, SUM(valor) AS total
        FROM entradas
        INNER JOIN financiadors ON entradas.financiador_id = financiadors.id
        INNER JOIN projectos ON entradas.projecto_id = projectos.id
        where YEAR(entradas.created_at) = '.$year.'
        group by financiadors.name, projectos.acronimo');
        return view('home', compact('entradas', 'saidas', 'financiadors', 'participantes', 'projectos', 'finSoma', 'dados'));
    }
}
