<x-user-layout>
    <x-slot name="title">TalentoTech | Course Create</x-slot>

    <div class="max-w-4xl mx-auto mt-10 bg-gray-900 text-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-center text-blue-400 mb-8">Crear Nuevo Curso</h1>

        <!-- Formulario para crear curso -->
        {{-- {{ route('course.store') }} --}}
        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf


            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-300">Título del Curso</label>
                <input type="text" id="title" name="title"
                    class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white"
                    required placeholder="Ingrese el título del curso">
            </div>


            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-300">Descripción del Curso</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white"
                    required placeholder="Escriba una breve descripción del curso"></textarea>
            </div>


            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-300">Imagen del Curso</label>
                <input type="file" id="image" name="image"
                    class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white">
                <small class="text-gray-400 mt-1 block">La imagen debe ser en formato .jpg, .png o .jpeg.</small>
            </div>


            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-300">Fecha de Inicio</label>
                <input type="date" id="start_date" name="start_date"
                    class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white"
                    required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-300">Fecha de Inicio</label>
                <input type="date" id="end_date" name="end_date"
                    class="mt-2 p-3 w-full border border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 text-white"
                    required>
            </div>


            <div class="text-center mt-6">
                <button type="submit"
                    class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-lg hover:bg-green-700 transition duration-300">
                    Crear Curso
                </button>
            </div>
        </form>
    </div>
</x-user-layout>
