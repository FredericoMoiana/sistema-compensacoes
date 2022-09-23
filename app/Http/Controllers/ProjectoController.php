<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProjectoRequest;
use App\Models\Projecto;
use Illuminate\Http\Request;

class ProjectoController extends Controller
{
    public function index(Request $request){
        $projectos = Projecto::where('name', 'LIKE', "%{$request->search}%")->get();
        return view('projectos/index', compact('projectos'));
    }
    public function show($id)
    {
        if (!$financiador = Projecto::find($id))
            return redirect()->route('projectos.index');
        return view('projectos/show', compact('projecto'));
    }
    public function create()
    {
        return view('projectos.create');
    }
    public function store(StoreUpdateProjectoRequest $request)
    {
        $data = $request->all();
        $projecto = Projecto::create($data);
        return redirect()->route('projectos.index');
    }
    public function edit($id)
    {
        //$projectos = Projecto::find($id);
        if (!$projecto = Projecto::find($id))
            return redirect()->route('projectos.index');
        return view('projectos/edit', compact('projecto'));
    }
    public function update(StoreUpdateProjectoRequest $request, $id)
    {
        if (!$projecto = Projecto::find($id))
            return redirect()->route('projectos.index');
        $data = $request->all();
        $projecto->update($data);
        return redirect()->route('projectos.index');
    }
    public function delete($id)
    {
        if (!$projecto = Projecto::find($id))
            return redirect()->route('projectos.index');
            $projecto->delete();

        return redirect()->route('projectos.index');
    }
}
