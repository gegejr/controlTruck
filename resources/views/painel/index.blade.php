@extends('layouts.app')

@section('title', 'Painel Inicial')

@section('content')
    <div class="text-2xl font-bold mb-4">Bem-vindo ao Painel de Controle</div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Motoristas</h2>
            <p class="text-gray-600 mb-4">Gerencie os motoristas do sistema.</p>
            <a href="{{ route('motoristas.index') }}" class="text-blue-600 hover:underline">Ver motoristas</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Caminhões</h2>
            <p class="text-gray-600 mb-4">Gerencie os caminhões cadastrados.</p>
            <a href="{{ route('caminhoes.index') }}" class="text-blue-600 hover:underline">Ver caminhões</a>
        </div>
    </div>
@endsection
