<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 text-gray-900">

<div class="flex h-screen">
    
    <!-- Sidebar -->
    <aside class="bg-white w-64 hidden md:block shadow-lg">
        <div class="p-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-blue-600">ControlTruck</h1>
        </div>
        <nav class="p-4 space-y-2" x-data="{ open1: false, open2: false }">
            <div>
            <a href="{{ route('painel') }}" class="flex items-center justify-between w-full px-4 py-2 rounded hover:bg-blue-100 text-gray-800">Painel</a>
            </div>
            <!-- Motoristas -->
            <div>
                <button @click="open1 = !open1"
                        class="flex items-center justify-between w-full px-4 py-2 rounded hover:bg-blue-100 text-gray-800">
                    <span class="flex items-center gap-2">
                        <i data-lucide="users" class="w-5 h-5"></i> Motoristas
                    </span>
                    <i data-lucide="chevron-down" :class="{'rotate-180': open1}" class="transition-transform w-4 h-4"></i>
                </button>
                <div x-show="open1" class="ml-8 mt-1 space-y-1" x-cloak>
                    <a href="{{ route('motoristas.index') }}" class="block py-1 text-sm text-gray-700 hover:underline">Listar</a>
                    <a href="{{ route('motoristas.create') }}" class="block py-1 text-sm text-gray-700 hover:underline">Cadastrar</a>
                </div>
            </div>

            <!-- Caminhões -->
            <div>
                <button @click="open2 = !open2"
                        class="flex items-center justify-between w-full px-4 py-2 rounded hover:bg-blue-100 text-gray-800">
                    <span class="flex items-center gap-2">
                        <i data-lucide="truck" class="w-5 h-5"></i> Caminhões
                    </span>
                    <i data-lucide="chevron-down" :class="{'rotate-180': open2}" class="transition-transform w-4 h-4"></i>
                </button>
                <div x-show="open2" class="ml-8 mt-1 space-y-1" x-cloak>
                    <a href="{{ route('caminhoes.index') }}" class="block py-1 text-sm text-gray-700 hover:underline">Listar</a>
                    <a href="{{ route('caminhoes.create') }}" class="block py-1 text-sm text-gray-700 hover:underline">Cadastrar</a>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow flex justify-between items-center px-6 h-16">
            <!-- Botão hambúrguer no mobile -->
            <button id="toggleSidebar" class="md:hidden text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 lucide lucide-menu" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Nome do usuário e botão logout -->
            <div class="flex items-center gap-4 ml-auto">
                @auth
                <span class="text-sm text-gray-700">Olá, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm flex items-center gap-1">
                        <i data-lucide="log-out" class="w-4 h-4"></i> Sair
                    </button>
                </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover::underline">Entrar</a>
                @endguest
            </div>
        </header>




        <!-- Content -->
        <main class="p-6 overflow-auto">
            @yield('content')
        </main>
    </div>
</div>

<!-- Mobile Sidebar -->
<div id="mobileSidebar" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden">
    <div class="bg-white w-64 h-full shadow-lg p-6 space-y-4">
        <h1 class="text-xl font-bold text-blue-600">ControlTruck</h1>
        <a href="{{ route('motoristas.index') }}" class="block text-gray-800 hover:underline">Motoristas</a>
        <a href="{{ route('caminhoes.index') }}" class="block text-gray-800 hover:underline">Caminhões</a>
        <hr>
        @auth
        <p class="text-sm text-gray-600">Olá, {{ Auth::user()->name }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm w-full text-left">
                <i data-lucide="log-out" class="w-4 h-4 inline-block mr-1"></i> Sair
            </button>
        </form>
        @endauth
    </div>
</div>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Ativa os ícones do Lucide
        if (window.lucide && typeof lucide.createIcons === 'function') {
            lucide.createIcons();
        }

        // Seleciona o botão e a sidebar
        const sidebar = document.getElementById('mobileSidebar');
        const toggleButton = document.getElementById('toggleSidebar');

        // Adiciona eventos só se os elementos forem encontrados
        if (sidebar && toggleButton) {
            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
            });

            sidebar.addEventListener('click', (e) => {
                if (e.target === sidebar) {
                    sidebar.classList.add('hidden');
                }
            });
        }
    });
</script>


<!-- Lucide icons (import e ativação no final do body) -->
<script src="https://unpkg.com/lucide@0.270.0/dist/umd/lucide.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.lucide) {
            lucide.replace();
        }
    });
</script>

</body>
</html>
