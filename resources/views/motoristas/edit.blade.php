@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="my-6">
        <h1 class="text-2xl font-bold mb-4">Editar Motorista</h1>

        <form action="{{ route('motoristas.update', $motorista) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Nome</label>
                <input type="text" name="name" value="{{ old('name', $motorista->name) }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $motorista->email) }}" class="w-full border rounded p-2" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
