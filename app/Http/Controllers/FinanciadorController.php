<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFinanciadorRequest;
use App\Models\Financiador;
use Illuminate\Http\Request;

class FinanciadorController extends Controller
{
    public function index(Request $request){
        $financiadors = Financiador::where('name', 'LIKE', "%{$request->search}%")->get();
        return view('financiadors/index', compact('financiadors'));
    }
    public function show($id)
    {
        if (!$financiador = Financiador::find($id))
            return redirect()->route('financiadors.index');
        return view('financiadors/show', compact('financiador'));
    }
    public function create()
    {
        return view('financiadors.create');
    }
    public function store(StoreUpdateFinanciadorRequest $request)
    {
        $data = $request->all();
        $financiador = Financiador::create($data);
        return redirect()->route('financiadors.index');
    }
    public function edit($id)
    {
        //$financiadors = Financiador::find($id);
        if (!$financiador = Financiador::find($id))
            return redirect()->route('financiadors.index');
        return view('financiadors/edit', compact('financiador'));
    }
    public function update(StoreUpdateFinanciadorRequest $request, $id)
    {
        if (!$financiador = Financiador::find($id))
            return redirect()->route('financiadors.index');
        $data = $request->all();
        $financiador->update($data);
        return redirect()->route('financiadors.index');
    }
    public function delete($id)
    {
        if (!$financiador = Financiador::find($id))
            return redirect()->route('financiadors.index');
            $financiador->delete();

        return redirect()->route('financiadors.index');
    }
}
