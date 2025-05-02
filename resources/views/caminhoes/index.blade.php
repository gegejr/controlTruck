@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center my-6">
        <h1 class="text-2xl font-bold">Caminhões</h1>
        <a href="{{ route('caminhoes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Novo Caminhão
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Placa</th>
                    <th class="px -4 py-2">Marca</th>
                    <th class="px-4 py-2">Modelo</th>
                    <th class="px-4 py-2">Ano</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($caminhoes as $caminhao)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $caminhao->placa }}</td>
                    <td class="px-4 py-2">{{ $caminhao->marca}}</td>
                    <td class="px-4 py-2">{{ $caminhao->modelo }}</td>
                    <td class="px-4 py-2">{{ $caminhao->ano }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('caminhoes.edit', $caminhao) }}" class="text-blue-500 hover:underline mr-2">Editar</a>
                        <form action="{{ route('caminhoes.destroy', $caminhao) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Deseja deletar este caminhão?')" class="text-red-500 hover:underline">
                                Deletar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($caminhoes->isEmpty())
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                        Nenhum caminhão cadastrado.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
