<x-user-layout>
    <x-slot name="title">TalentoTech | Publicación</x-slot>


    <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto my-8">
        <!-- Título de la Publicación -->
        <h1 class="text-purple-950 text-5xl font-extrabold mb-6 text-center">{{ $publication->title }}</h1>

        <!-- Contenido de la Publicación -->
        <p class="text-gray-700 text-lg leading-relaxed mb-6 text-justify">{{ $publication->content }}</p>

        <!-- Mensajes de Éxito o Error -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de Subida de Archivo -->
        <form action="{{ route('submission.store', ['course' => $courseId, 'publication' => $publication->id]) }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Subir tarea</label>
                <input type="file" id="file" name="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <p class="text-xs text-gray-500 mt-1">Formatos permitidos: jpg, jpeg, png, pdf, doc, docx (máx. 2 MB)
                </p>
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
                <p>Número de intentos: {{ $submission->attempts }}</p>
            </div>
        @else
            <p class="mt-4 text-gray-600">Aún no has realizado una entrega para esta publicación.</p>
        @endif
    </div>




</x-user-layout>
