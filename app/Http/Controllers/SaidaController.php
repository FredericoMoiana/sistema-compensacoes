<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSaidaRequest;
use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function index(Request $request){
        $saidas = Saida::where('name', 'LIKE', "%{$request->search}%")->get();
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
        return view('saidas.create');
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
        return view('saidas/edit', compact('saida'));
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
