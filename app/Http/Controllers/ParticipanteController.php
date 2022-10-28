<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateParticipanteRequest;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    public function index(Request $request){
        $participantes = Participante::where('codigo', 'LIKE', "%{$request->search}%")->get();
        return view('participantes/index', compact('participantes'));
    }
    public function show($id)
    {
        if (!$participante = Participante::find($id))
            return redirect()->route('participantes.index');
        return view('participantes/show', compact('participante'));
    }
    public function create()
    {
        return view('participantes.create');
    }
    public function store(StoreUpdateParticipanteRequest $request)
    {
        $data = $request->all();
        $participante = Participante::create($data);
        return redirect()->route('participantes.index');
    }
    public function edit($id)
    {
        //$participantes = Participante::find($id);
        if (!$participante = Participante::find($id))
            return redirect()->route('participantes.index');
        return view('participantes/edit', compact('participante'));
    }
    public function update(StoreUpdateParticipanteRequest $request, $id)
    {
        if (!$participante = Participante::find($id))
            return redirect()->route('participantes.index');
        $data = $request->all();
        $participante->update($data);
        return redirect()->route('participantes.index');
    }
    public function delete($id)
    {
        if (!$participante = Participante::find($id))
            return redirect()->route('participantes.index');
            $participante->delete();

        return redirect()->route('participantes.index');
    }
}
