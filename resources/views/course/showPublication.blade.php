<x-user-layout>
    <x-slot name="title">TalentoTech | Publicación</x-slot>

    <div class="flex flex-col lg:flex-row bg-gray-100 min-h-screen">
        <!-- Contenido Principal -->
        <div class="lg:w-3/4 bg-white rounded-lg shadow-lg p-8 mx-auto my-8 mb-8 lg:mb-0">
            <!-- Título de la Publicación -->
            <h1 class="text-purple-950 text-5xl font-extrabold mb-6 text-center">{{ $publication->title }}</h1>

            <!-- Contenido de la Publicación -->
            <p class="text-gray-700 text-lg leading-relaxed mb-6 text-justify">{{ $publication->content }}</p>

            <!-- Mensajes de Éxito o Error -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Mostrar Formulario Solo para Estudiantes -->
            @if (auth()->user()->hasRole('student'))
                <!-- Formulario de Subida de Archivo -->
                <form
                    action="{{ route('submission.store', ['course' => $courseId, 'publication' => $publication->id]) }}"
                    method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700">Subir tarea</label>
                        <input type="file" id="file" name="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p class="text-xs text-gray-500 mt-1">Formatos permitidos: jpg, jpeg, png, pdf, doc, docx (máx. 2 MB)</p>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Subir tarea
                        </button>
                    </div>
                </form>

                <!-- Información de la Entrega -->
                @if (isset($submission))
                    <div class="mt-6 p-4 bg-gray-100 rounded-lg">
                        <p>Subido por: {{ $submission->user->name }}</p>
                        <p>Fecha de entrega: {{ $submission->submitted_at }}</p>
                        <p>Archivo: <a href="{{ Storage::url($submission->content) }}" target="_blank"
                                class="text-blue-600 hover:underline">Ver archivo</a></p>
                        <p>Número de intentos: {{ $submission->attempts }} (Intentos restantes:
                            {{ 2 - $submission->attempts }})</p>
                    </div>
                @else
                    <p class="mt-4 text-gray-600">Aún no has realizado una entrega para esta publicación.</p>
                    <p class="text-gray-600">Intentos restantes: 2</p>
                @endif
            @endif <!-- Fin del Formulario Solo para Estudiantes -->
        </div>

        <!-- Estudiantes que entregaron, siempre visible -->
        <div class="lg:w-1/4 bg-white rounded-lg shadow-lg p-8 my-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Estudiantes que entregaron</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($students as $student)
                    <li class="py-4 flex items-center space-x-4 px-6 hover:bg-gray-100 transition duration-300">
                        <img src="{{ asset($student->user->profile->foto_perfil) }}" alt="Foto de perfil"
                            class="w-12 h-12 rounded-full object-cover border border-gray-300 shadow-sm">
                        <div class="flex-1">
                            <p class="text-lg font-medium text-gray-900">{{ $student->user->profile->nombre }}</p>
                            <p class="text-sm text-gray-600">{{ $student->user->email }}</p>
                        </div>
                        <div>
                            <button
                                class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                                Ver Entrega
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-user-layout>
