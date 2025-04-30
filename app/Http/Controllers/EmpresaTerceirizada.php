<?php

namespace App\Http\Controllers;

use App\Models\EmpresaTerceirizada;
use Illuminate\Http\Request;

class EmpresaTerceirizadaController extends Controller
{
    public function index()
    {
        return EmpresaTerceirizada::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'nome_resposnavel' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:20',
        ]);

        return EmpresaTerceirizada::create($validated);
    }

    public function show(EmpresaTerceirizada $empresa)
    {
        return $empresa;
    }

    public function update(Request $request, EmpresaTerceirizada $empresa)
    {
        $empresa->update($request->all());
        return $empresa;
    }

    public function destroy(EmpresaTerceirizada $empresa)
    {
        $empresa->delete();
        return response()->noContent();
    }
}
