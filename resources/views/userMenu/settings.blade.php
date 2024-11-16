<x-user-layout>
    <x-slot name="title">Configuración de Usuario</x-slot>

    <div class="max-w-6xl mx-auto mt-10 bg-gray-900 text-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-center text-blue-400 mb-8">Configuración de Perfil</h1>

        <!-- Información de usuario -->
        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-4 text-blue-300">Editar Información de Usuario</h2>

            <form action="{{ route('update.settings') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Bloque Nombre y Apellido -->
                <div class="flex space-x-6">
                    <div class="flex-1">
                        <label for="nombre" class="block text-sm font-medium text-gray-300">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $profile->nombre) }}" 
                            class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white" required>
                    </div>
                    <div class="flex-1">
                        <label for="apellido" class="block text-sm font-medium text-gray-300">Apellido</label>
                        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $profile->apellido) }}" 
                            class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white" required>
                    </div>
                </div>

                <!-- Bloque Teléfono y Dirección -->
                <div class="flex space-x-6">
                    <div class="flex-1">
                        <label for="telefono" class="block text-sm font-medium text-gray-300">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $profile->telefono) }}" 
                            class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
                    </div>
                    <div class="flex-1">
                        <label for="direccion" class="block text-sm font-medium text-gray-300">Dirección</label>
                        <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $profile->direccion) }}" 
                            class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
                    </div>
                </div>

                <!-- Bloque Fecha de Nacimiento -->
                <div>
                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-300">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $profile->fecha_nacimiento) }}" 
                        class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
                </div>

                <!-- Bloque Biografía -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-300">Biografía</label>
                    <textarea id="bio" name="bio" rows="3" 
                        class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">{{ old('bio', $profile->bio) }}</textarea>
                </div>

                <!-- Bloque Foto de Perfil -->
                <div>
                    <label for="foto_perfil" class="block text-sm font-medium text-gray-300">Foto de Perfil</label>
                    <div class="flex items-center space-x-4 mt-2">
                        <input type="file" id="foto_perfil" name="foto_perfil" 
                            class="p-3 border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
                        @if($profile->foto_perfil)
                            <img src="{{ asset($profile->foto_perfil) }}" alt="Foto de perfil" class="w-24 h-24 rounded-full">
                        @endif
                    </div>
                </div>

                <!-- Botón Guardar Cambios -->
                <div class="text-center mt-6">
                    <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-lg hover:bg-green-700 transition duration-300">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </section>
    </div>
</x-user-layout>

