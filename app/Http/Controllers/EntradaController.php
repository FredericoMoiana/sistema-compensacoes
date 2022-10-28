<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEntradaRequest;
use App\Models\Entrada;
use App\Models\Financiador;
use App\Models\Projecto;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
public function index(Request $request){
        $entradas = Entrada::where('id', 'LIKE', "%{$request->search}%")->get();
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
        return view('entradas.create');
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
        return view('entradas/edit', compact('entrada'));
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
    public function showNameFinanciador($id)
    {
        $financiador = Financiador::find($id);
        return $financiador->name;
    }
    public function showNameProject($id)
    {
        $projecto = Projecto::find($id);
        return $projecto->name;
    }
}
