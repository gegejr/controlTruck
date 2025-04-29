<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MotoristaController extends Controller
{
    public function index()
    {
        $motoristas = User::motoristas()->get();
        return view('motoristas.index', compact('motoristas'));
    }

    public function create()
    {
        return view('motoristas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'motorista', // Definindo o papel como motorista
        ]);

        return redirect()->route('motoristas.index')->with('success', 'Motorista criado com sucesso!');
    }

    public function edit(User $motorista)
    {
        return view('motoristas.edit', compact('motorista'));
    }

    public function update(Request $request, User $motorista)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $motorista->id,
        ]);

        $motorista->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('motoristas.index')->with('success', 'Motorista atualizado com sucesso!');
    }

    public function destroy(User $motorista)
    {
        $motorista->delete();
        return redirect()->route('motoristas.index')->with('success', 'Motorista deletado com sucesso!');
    }
}
