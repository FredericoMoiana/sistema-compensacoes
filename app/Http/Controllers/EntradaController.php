<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEntradaRequest;
use App\Models\Entrada;
use App\Models\Financiador;
use App\Models\Projecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
    public function index(Request $request)
    {
        //$entradas = Entrada::where('id', 'LIKE', "%{$request->search}%")->get();
        $entradas = DB::table('entradas')
        ->join('financiadors', 'entradas.financiador_id', '=', 'financiadors.id')
        ->join('projectos', 'entradas.projecto_id', '=', 'projectos.id')
        ->select('entradas.*', 'financiadors.name', 'projectos.acronimo')
        ->where('projectos.acronimo', 'LIKE', "%{$request->search}%")
        ->get();
        return view('entradas/index', compact('entradas'));
    }
    public function show($id)
    {
        if (!$Entrada = Entrada::find($id))
            return redirect()->route('entradas.index');
        return view('entradas/show', compact('entrada'));
    }
    public function create()
    {
        $financiadores = Financiador::all(['id', 'name']);
        $projectos = Projecto::all(['id', 'acronimo']);
        return view('entradas.create', compact('projectos', 'financiadores'));
    }
    public function store(StoreUpdateEntradaRequest $request)
    {
        $data = $request->all();
        $entrada = Entrada::create($data);
        return redirect()->route('entradas.index');
    }
    public function edit($id)
    {
        //$entradas = Entrada::find($id);
        if (!$entrada = Entrada::find($id))
        return redirect()->route('entradas.index');
        $financiador = Financiador::find($entrada->financiador_id);
        $projecto = Projecto::find($entrada->projecto_id);
        $financiadores = Financiador::all(['id', 'name']);
        $projectos = Projecto::all(['id', 'acronimo']);
        return view('entradas/edit', compact('entrada', 'projecto', 'financiador','projectos', 'financiadores'));
    }
    public function update(StoreUpdateEntradaRequest $request, $id)
    {
        if (!$entrada = Entrada::find($id))
            return redirect()->route('entradas.index');
        $data = $request->all();
        $entrada->update($data);
        return redirect()->route('entradas.index');
    }
    public function delete($id)
    {
        if (!$entrada = Entrada::find($id))
            return redirect()->route('entradas.index');
        $entrada->delete();

        return redirect()->route('entradas.index');
    }
}
