<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateParticipanteRequest;
use App\Models\Participante;
use App\Models\Projecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipanteController extends Controller
{
    public function index(Request $request){
        // $participantes = Participante::where('codigo', 'LIKE', "%{$request->search}%")->get();
        $participantes = DB::table('participantes')
        ->join('projectos', 'participantes.projecto_id', '=', 'projectos.id')
        ->select('participantes.*', 'projectos.acronimo')
        ->where('participantes.codigo', 'LIKE', "%{$request->search}%")
        ->get();
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
        $projectos = Projecto::all(['id', 'acronimo']);
        return view('participantes.create', compact('projectos'));
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
            $projectos = Projecto::all(['id', 'acronimo']);
        return view('participantes/edit', compact('participante', 'projectos'));
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
