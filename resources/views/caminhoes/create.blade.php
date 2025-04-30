@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="my-6">
        <h1 class="text-2xl font-bold mb-4">Cadastrar Caminhão</h1>

        <form action="{{ route('caminhoes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Placa</label>
                <input type="text" name="placa" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Marca</label>
                <input type="text" name="marca" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Modelo</label>
                <input type="text" name="modelo" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Ano</label>
                <input type="number" name="ano" class="w-full border rounded p-2" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
