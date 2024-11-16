<x-app-layout>
    <x-slot name="title">TalentoTech | Contacto</x-slot>

    <section class="py-16 bg-gradient-to-r from-blue-50 to-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">¡Ponte en Contacto con Nosotros!</h2>
            <p class="text-gray-600 text-lg mb-12">
                Si tienes alguna pregunta o comentario, no dudes en enviarnos un mensaje. Estamos aquí para ayudarte.
            </p>
            
            <!-- Formulario de contacto -->
            {{-- {{ route('contact.store') }} --}}
            <form action="" method="POST" class="w-full max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-lg font-semibold mb-2">Tu Nombre</label>
                    <input type="text" id="name" name="name" class="w-full p-4 border border-gray-300 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-lg font-semibold mb-2">Tu Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="w-full p-4 border border-gray-300 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-gray-700 text-lg font-semibold mb-2">Tu Mensaje</label>
                    <textarea id="message" name="message" rows="6" class="w-full p-4 border border-gray-300 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Enviar Mensaje
                </button>
            </form>
        </div>
    </section>

</x-app-layout>
