<x-user-layaout>
    <x-slot name="title">TalentoTech | Publicación</x-slot>

    <h1>Siiii</h1>

    <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto my-8">
        <h1 class="text-purple-950 text-5xl font-extrabold mb-6">{{ $publication->title }}</h1>
        <p class="text-gray-700 text-lg leading-relaxed mb-4">{{ $publication->content }}</p>

        <form action=" {{ route('submission.store', ['course' => $courseId, 'publication' => $publication->id]) }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Subir tarea</label>
                <input type="file" id="file" name="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Subir tarea
            </button>
        </form>
    </div>

    {{-- <div class="mt-4 p-4 bg-gray-100 rounded-lg">
        <p>Subido por: {{ $submission->user->name }}</p>
        <p>Fecha de entrega: {{ $submission->submitted_at }}</p>
        <p>Archivo: <a href="{{ Storage::url($submission->content) }}" target="_blank">Ver archivo</a></p>
    </div> --}}

</x-user-layaout>
