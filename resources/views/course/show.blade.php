<x-user-layaout>
    <x-slot name="title">TalentoTech | Show</x-slot>

    <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto my-8">
        <h1 class="text-purple-950 text-5xl font-extrabold mb-6">{{ $course->title }}</h1>
        <p class="text-gray-700 text-lg leading-relaxed">{{ $course->description }}</p>

        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Publicaciones</h2>

            @forelse ($publications as $publication)
                <a href=" {{ route('course.publication', ['course' => $course->id, 'publication' => $publication->id]) }} " class="block p-6 bg-white rounded-lg
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
</x-user-layaout>
