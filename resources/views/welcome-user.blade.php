<x-user-layout>
    <x-slot name='title'>TalentoTech | {{ $users->name }}</x-slot>

    <div class="relative flex items-center justify-center w-32 h-32 rounded-full bg-gray-800">
        <div class="absolute inset-0 bg-gray-700 rounded-full"></div>
        <div 
            class="absolute inset-0 rounded-full bg-[conic-gradient(theme(colors.blue.500)_0%,theme(colors.blue.500)_   75%,theme(colors.gray.700)_75%,theme(colors.gray.700)_100%)]">
        </div>
        <div class="relative bg-gray-900 rounded-full flex items-center justify-center w-24 h-24">
            <span class="text-white text-lg font-semibold">75%</span>
        </div>
    </div>

    
    <script>
        window.addEventListener('beforeunload', function(event) {
            fetch('{{ route('logout') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
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

