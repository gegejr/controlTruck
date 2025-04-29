@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center my-6">
        <h1 class="text-2xl font-bold">Motoristas</h1>
        <a href="{{ route('motoristas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Novo Motorista
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
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motoristas as $motorista)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $motorista->name }}</td>
                    <td class="px-4 py-2">{{ $motorista->email }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('motoristas.edit', $motorista) }}" class="text-blue-500 hover:underline mr-2">Editar</a>

                        <form action="{{ route('motoristas.destroy', $motorista) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar?')" class="text-red-500 hover:underline">
                                Deletar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($motoristas->isEmpty())
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                        Nenhum motorista cadastrado.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
