<x-user-layout>
    <x-slot name="title">TalentoTech | Show</x-slot>

    <div class="container mx-auto my-8 flex gap-8">
        <!-- Información del curso y publicaciones -->
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl w-full mx-auto">
            <h1 class="text-purple-950 text-5xl font-extrabold mb-6 text-center">{{ $course->title }}</h1>
            <p class="text-gray-700 text-lg leading-relaxed text-center">{{ $course->description }}</p>

            <!-- Sección de publicaciones -->
            <div class="mt-6">
                <div class="flex justify-between items-center mb-4 border-b pb-2">
                    <h2 class="text-xl font-semibold text-gray-900">Publicaciones</h2>
                    
                    @if(auth()->user()->hasRole('teacher'))
                    {{-- {{ route('course.publication.create', $course->id) }} --}}
                        <a href="{{ route('course.create.post') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition duration-200 ease-in-out">
                            + Nueva Publicación
                        </a>
                    @endif
                </div>

                @forelse ($publications as $publication)
                    <a href="{{ route('course.publication', ['course' => $course->id, 'publication' => $publication->id]) }}" 
                       class="block bg-gray-100 p-4 rounded-lg mb-4 hover:bg-gray-200 transition duration-200 ease-in-out">
                        <h3 class="text-lg font-bold text-blue-600">{{ $publication->title }}</h3>
                        <p class="text-sm text-gray-700">{{ Str::limit($publication->content, 100) }}</p>
                        <p class="text-xs text-gray-500">Fecha de publicación: 
                            {{ $publication->created_at->format('d-m-Y') }}</p>
                    </a>
                @empty
                    <p>No hay publicaciones disponibles.</p>
                @endforelse
            </div>
        </div>

        <!-- Lista de usuarios registrados a la derecha -->
        <div class="w-1/4 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Usuarios Registrados</h2>
            <ul class="space-y-4">
                @forelse ($users as $user)
                    <li class="flex items-center bg-gray-100 p-4 rounded-lg shadow-sm hover:bg-gray-200 transition duration-200 ease-in-out">
                        <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-800">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                        </div>
                    </li>
                @empty
                    <li class="text-gray-600">No hay usuarios registrados en este curso.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-user-layout>
