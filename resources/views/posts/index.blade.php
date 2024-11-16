<x-app-layout>
    <x-slot name='title'>TalentoTech | Publicaciones</x-slot>

    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Publicaciones</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts as $post)
                <div
                    class="bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                    <!-- Imagen del post -->
                    <div class="h-48 bg-gray-200">
                        <img src="{{ $post->image_url ?? 'https://via.placeholder.com/300x200' }}"
                            alt="Imagen de {{ $post->title }}" class="object-cover w-full h-full">
                    </div>

                    <!-- Contenido del post -->
                    <div class="p-6">
                        {{-- {{ route('show', $post->id) }} --}}
                        <a href="#" class="text-xl font-semibold text-blue-600 hover:underline">
                            {{ $post->title }}
                        </a>
                        <p class="text-gray-600 text-sm mt-2">
                            {{ Str::limit($post->description, 100, '...') }}
                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-gray-500 text-xs">{{ $post->created_at->format('d M, Y') }}</span>
                            <a href="{{ route('singup') }}" class="text-blue-500 text-sm font-medium hover:underline">
                                Unete
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Paginación -->
        <div class="mt-12">
            <div class="text-center block">
                {{ $posts->links('pagination::simple-tailwind') }}
            </div>
            <div class="text-center text-gray-500 text-sm mt-2">
                {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results
            </div>
        </div>
    </div>
</x-app-layout>
