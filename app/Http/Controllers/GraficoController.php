<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Financiador;
use App\Models\Projecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function projectoMes(Request $request)
    {
        $projectos = Projecto::all(['id', 'acronimo']);
        $project_id = $request->projecto_id;
        $data = date_create($request->data);
        $year = $data->format('Y');
        $month = $data->format('m');

        $tEntradas = DB::table('entradas')->where('projecto_id', $project_id)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->sum('valor');
        $tSaidas = DB::table('saidas')->where('projecto_id', $project_id)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->sum('valor');
        $saldo = $tEntradas - $tSaidas;
        $dados = ['Saldo' => $saldo, 'Valor Gasto' => $tSaidas, 'Valor Alocado' => $tEntradas];
        return view('graficos/projecto/mes', compact('projectos', 'dados'));
    }
    public function projectoAno(Request $request)
    {
        $projectos = Projecto::all(['id', 'acronimo']);
        $project_id = $request->projecto_id;
        $data = date_create($request->data);
        $year = $data->format('Y');
        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $month = 1;
        do {
            $tEntradas = DB::table('entradas')->where('projecto_id', $project_id)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->sum('valor');
            $tSaidas = DB::table('saidas')->where('projecto_id', $project_id)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->sum('valor');
            $saldo = $tEntradas - $tSaidas;
            $dadosBar[] = [$saldo, $tSaidas, $tEntradas];
            $month = $month + 1;
        } while ($month <= 12);
        $tEntradas = DB::table('entradas')->where('projecto_id', $project_id)->whereYear('created_at', '=', $year)->sum('valor');
        $tSaidas = DB::table('saidas')->where('projecto_id', $project_id)->whereYear('created_at', '=', $year)->sum('valor');
        $saldo = $tEntradas - $tSaidas;
        $dadosPie = ['Saldo' => $saldo, 'Valor Gasto' => $tSaidas, 'Valor Alocado' => $tEntradas];
        return view('graficos/projecto/ano', compact('projectos', 'dadosPie', 'dadosBar', 'months'));
    }
    public function financiadorMes(Request $request)
    {
        $financiadors = Financiador::all(['id', 'name']);
        $financiador_id = $request->financiador_id ?? 0;
        $data = date_create($request->data);
        $year = $data->format('Y');
        $month = $data->format('m');
        $projectos = DB::select('select projectos.acronimo, SUM(valor) as total
        from entradas
        INNER JOIN financiadors on entradas.financiador_id = financiadors.id
        INNER JOIN projectos on entradas.projecto_id = projectos.id
        where entradas.financiador_id = ' . $financiador_id . ' and
        YEAR(entradas.created_at) = ' . $year . ' and
        Month(entradas.created_at) = ' . $month . '
        group By projectos.acronimo');
        return view('graficos/financiador/mes', compact('financiadors', 'projectos'));
    }
    public function financiadorAno(Request $request)
    {
        $financiadors = Financiador::all(['id', 'name']);
        $financiador_id = $request->financiador_id ?? 0;
        $data = date_create($request->data);
        $year = $data->format('Y');
        $anoProjectos = array();
        if ($financiador_id != 0) {
            for ($i = 1; $i <= 12; $i++) {
                $projectos = DB::table('entradas')
                ->where('financiador_id', $financiador_id)
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->sum('valor');
                $anoProjectos[] = $projectos;
            }
        } else {
            $anoProjectos[] = $financiadors;
        }

        return view('graficos/financiador/ano', compact('financiadors', 'anoProjectos'));
    }
    public function todosMes(Request $request)
    {
        return view('graficos/todos/mes');
    }
    public function todosAno(Request $request)
    {
        return view('graficos/todos/ano');
    }
}
