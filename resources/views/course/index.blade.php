<x-user-layout>
    <x-slot name='title'>TalentoTech | Course</x-slot>

    <div class="flex flex-col items-center mt-10">
        @if(auth()->user()->hasRole('teacher'))
            <div class="text-center mb-6">
                <a href="{{ route('course.create') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">
                    Crear Nuevo Curso
                </a>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-4xl">
            @foreach ($courses as $cours)
                <div class="bg-white shadow rounded-lg p-4 flex flex-col items-center transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-2xl">
                    <div class="w-full h-40 bg-gray-200 rounded-lg overflow-hidden mb-4">
                        <img src="{{ $cours->image_url ?? 'https://via.placeholder.com/300' }}" alt="Imagen del curso {{ $cours->title }}" class="object-cover w-full h-full transition duration-300 ease-in-out hover:scale-110">
                    </div>
                    
                    <a href="{{ route('course.show', ['course' => $cours->id]) }}" class="text-xl font-semibold text-blue-600 hover:underline text-center">
                        {{ $cours->title }}
                    </a>
                    
                    <!-- Descripción del curso -->
                    <p class="text-gray-600 text-sm mt-2 text-center">
                        {{ Str::limit($cours->description, 100) }}
                    </p>

                    <!-- Botones de edición y eliminación solo para 'teacher' -->
                    @if(auth()->user()->hasRole('teacher'))
                        <div class="mt-4 flex justify-between w-full">
                            <a href=" {{ route('course.edit', $cours->id) }} " class="text-blue-500 hover:underline text-sm">
                                Editar
                            </a>
                            <form action="" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este curso?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-6 w-full max-w-lg">
            <div class="text-center mb-4">
                {{ $courses->links() }}
            </div>
            <div class="text-center text-gray-500 text-sm">
                {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of {{ $courses->total() }} results
            </div>
        </div>
    </div>
</x-user-layout>

{{-- {{ route('course.destroy', ['course' => $cours->id]) }} --}}
{{-- {{ route('course.edit', ['course' => $cours->id]) }} --}}
