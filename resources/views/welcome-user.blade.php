<x-user-layout>
    <x-slot name='title'>TalentoTech | {{ $users->name }}</x-slot>

    <!-- Barra de navegación -->
    <nav class="bg-blue-600 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div>
                <h1 class="text-2xl font-bold">TalentoTech</h1>
            </div>
            <div>
                <span class="text-lg font-medium">Bienvenido, {{ $users->name }}</span>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container mx-auto py-8 px-4">
        <!-- Sección de perfil -->
        <section class="text-center mb-8">
            <div class="relative flex items-center justify-center w-32 h-32 mx-auto rounded-full bg-gray-800">
                <div class="absolute inset-0 bg-gray-700 rounded-full"></div>
                <div
                    class="absolute inset-0 rounded-full bg-[conic-gradient(theme(colors.blue.500)_0%,theme(colors.blue.500)_75%,theme(colors.gray.700)_75%,theme(colors.gray.700)_100%)]">
                </div>
                <div class="relative bg-gray-900 rounded-full flex items-center justify-center w-24 h-24">
                    <span class="text-white text-lg font-semibold">75%</span>
                </div>
            </div>
            <h2 class="text-xl font-semibold mt-4">{{ $users->name }}</h2>
            <p class="text-gray-600">Progreso del curso</p>
        </section>

        <!-- Contenido adicional -->
        <section class="bg-gray-100 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4">Tus Cursos</h3>
            <ul class="space-y-4">
                <li class="flex items-center justify-between bg-white p-4 rounded-lg shadow-sm">
                    <div>
                        <h4 class="text-lg font-semibold">Curso de Introducción a la Programación</h4>
                        <p class="text-sm text-gray-500">Progreso: 75%</p>
                    </div>
                    <a href="#" class="text-blue-500 hover:underline">Ver más</a>
                </li>
                <li class="flex items-center justify-between bg-white p-4 rounded-lg shadow-sm">
                    <div>
                        <h4 class="text-lg font-semibold">Curso de Inteligencia Artificial</h4>
                        <p class="text-sm text-gray-500">Progreso: 40%</p>
                    </div>
                    <a href="#" class="text-blue-500 hover:underline">Ver más</a>
                </li>
            </ul>
        </section>
    </main>

    <!-- Pie de página -->
    {{-- <footer class="bg-blue-600 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ now()->year }} TalentoTech. Todos los derechos reservados.</p>
        </div>
    </footer> --}}

    <script>
        window.addEventListener('beforeunload', function(event) {
            fetch('{{ route('logout') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                .then(function(response) {
                    console.log('Sesión cerrada');
                })
                .catch(function(error) {
                    console.error('Error al hacer logout:', error);
                });
        });
    </script>
</x-user-layout>
