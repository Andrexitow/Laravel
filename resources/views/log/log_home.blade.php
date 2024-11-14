<x-app-log-layaout>
    <x-slot name='title'>TalentoTech | @User</x-slot>
    <h1>a</h1>
    <script>
        window.addEventListener('beforeunload', function(event) {
            // Realizar la solicitud POST para logout antes de cerrar la pestaña/ventana
            fetch('{{ route("logout") }}', {
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
</x-app-log-layaout>

