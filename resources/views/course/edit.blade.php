<x-user-layout>
    <x-slot name="title">TalentoTech | Editar Curso</x-slot>

    <div class="max-w-4xl mx-auto mt-10 bg-gray-900 text-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-center text-blue-400 mb-8">Editar Curso</h1>

        <!-- Formulario para editar curso -->
        {{-- {{ route('course.update', $course->id) }} --}}
        <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-300">Título del Curso</label>
                <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white" required placeholder="Ingrese el título del curso">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-300">Descripción del Curso</label>
                <textarea id="description" name="description" rows="4" class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white" required placeholder="Escriba una breve descripción del curso">{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-300">Imagen del Curso</label>
                <input type="file" id="image" name="image" class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
                <small class="text-gray-400 mt-1 block">La imagen debe ser en formato .jpg, .png o .jpeg.</small>
                @if($course->image_url)
                    <div class="mt-4">
                        <img src="{{ asset($course->image_url) }}" alt="Imagen actual del curso" class="max-w-sm rounded-lg shadow-md">
                        <p class="text-gray-400 mt-2">Imagen actual</p>
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-300">Fecha de Inicio</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $course->start_date) }}" class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-300">Fecha de Fin</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $course->end_date) }}" class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white" required>
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">
                    Actualizar Curso
                </button>
            </div>
        </form>
    </div>
</x-user-layout>
