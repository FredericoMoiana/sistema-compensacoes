<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUpdateSaidaRequest;
use App\Models\Participante;
use App\Models\Projecto;

class SaidaController extends Controller
{
    public function index(Request $request)
    {
        //$saidas = Saida::where('id', 'LIKE', "%{$request->search}%")->get();
        $saidas = DB::table('saidas')
            ->join('participantes', 'saidas.participante_id', '=', 'participantes.id')
            ->join('projectos', 'saidas.projecto_id', '=', 'projectos.id')
            ->select('saidas.*', 'participantes.codigo', 'projectos.acronimo')
            ->where('projectos.acronimo', 'LIKE', "%{$request->search}%")
            ->get();
        return view('saidas/index', compact('saidas'));
    }
    public function show($id)
    {
        if (!$saida = Saida::find($id))
            return redirect()->route('saidas.index');
        return view('saidas/show', compact('saida'));
    }
    public function create()
    {
        $participantes = Participante::all(['id', 'codigo']);
        $projectos = Projecto::all(['id', 'acronimo']);
        return view('saidas.create', compact('participantes', 'projectos'));
    }
    public function store(StoreUpdateSaidaRequest $request)
    {
        $data = $request->all();
        $saida = Saida::create($data);
        return redirect()->route('saidas.index');
    }
    public function edit($id)
    {
        //$saidas = Saida::find($id);
        if (!$saida = Saida::find($id))
            return redirect()->route('saidas.index');
        $projecto = Projecto::find($saida->projecto_id);
        $participante = Participante::find($saida->participante_id);
        $participantes = Participante::all(['id', 'codigo']);
        $projectos = Projecto::all(['id', 'acronimo']);
        return view('saidas/edit', compact('saida', 'projecto', 'projectos', 'participante', 'participantes'));
    }
    public function update(StoreUpdateSaidaRequest $request, $id)
    {
        if (!$saida = Saida::find($id))
            return redirect()->route('saidas.index');
        $data = $request->all();
        $saida->update($data);
        return redirect()->route('saidas.index');
    }
    public function delete($id)
    {
        if (!$saida = Saida::find($id))
            return redirect()->route('saidas.index');
        $saida->delete();
        return redirect()->route('saidas.index');
    }
}
