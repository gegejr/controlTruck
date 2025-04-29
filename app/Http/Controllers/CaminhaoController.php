<?php

namespace App\Http\Controllers;

use App\Models\Caminhao;
use Illuminate\Http\Request;

class CaminhaoController extends Controller
{
    public function index()
    {
        $caminhoes = Caminhao::all();
        return view('caminhoes.index', compact('caminhoes'));
    }

    public function create()
    {
        return view('caminhoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|unique:caminhoes,placa|max:10',
            'modelo' => 'required|max:50',
            'ano' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        Caminhao::create($request->all());

        return redirect()->route('caminhoes.index')->with('success', 'Caminhão cadastrado com sucesso!');
    }

    public function edit(Caminhao $caminhao)
    {
        return view('caminhoes.edit', compact('caminhao'));
    }

    public function update(Request $request, Caminhao $caminhao)
    {
        $request->validate([
            'placa' => 'required|max:10|unique:caminhoes,placa,' . $caminhao->id,
            'modelo' => 'required|max:50',
            'ano' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $caminhao->update($request->all());

        return redirect()->route('caminhoes.index')->with('success', 'Caminhão atualizado com sucesso!');
    }

    public function destroy(Caminhao $caminhao)
    {
        $caminhao->delete();

        return redirect()->route('caminhoes.index')->with('success', 'Caminhão removido com sucesso!');
    }
}
