<x-user-layaout>
    <x-slot name='title'>TalentoTech | {{ $users->name }}</x-slot>

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
</x-user-layaout>

