@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="my-6">
        <h1 class="text-2xl font-bold mb-4">Cadastrar Motorista</h1>

        <form action="{{ route('motoristas.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Nome</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Senha</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Confirme a Senha</label>
                <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
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
