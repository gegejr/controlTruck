<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Caminhao;

class MotoristaController extends Controller
{
    public function index()
    {
        $motoristas = User::motoristas()->with('caminhao')->get();
        return view('motoristas.index', compact('motoristas'));
    }

    public function create()
    {
        $caminhoes = Caminhao::all();
        return view('motoristas.create', compact('caminhoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3|confirmed',
            'caminhao_id' => 'nullable|exists:caminhoes,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // será automaticamente criptografada no mutator
            'tipo' => 'motorista', // esse é o campo correto
            'caminhao_id' => $request->caminhao_id,
        ]);

        return redirect()->route('motoristas.index')->with('success', 'Motorista criado com sucesso!');
    }

    public function edit(User $motorista)
    {
        $caminhoes = Caminhao::all();
        return view('motoristas.edit', compact('motorista','caminhoes'));
    }

    public function update(Request $request, User $motorista)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $motorista->id,
            'caminhao_id' => 'nullable|exists:caminhoes,id',
        ]);

        $motorista->update([
            'name' => $request->name,
            'email' => $request->email,
            'caminhao_id' => $request->caminhao_id,
        ]);

        return redirect()->route('motoristas.index')->with('success', 'Motorista atualizado com sucesso!');
    }

    public function destroy(User $motorista)
    {
        $motorista->delete();
        return redirect()->route('motoristas.index')->with('success', 'Motorista deletado com sucesso!');
    }
}
