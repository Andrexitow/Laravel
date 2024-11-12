<x-app-layaout>
    <x-slot name='title'>TalentoTech | Publicaciones</x-slot>

    <div class="flex flex-col items-center mt-10">
        <ul class="space-y-4 w-full max-w-lg">
            @foreach ($posts as $post)
                <li class="p-4 bg-white shadow rounded-lg hover:bg-gray-50 transition duration-200 ease-in-out">
                    <a href="{{ route('show', $post->id) }}" class="text-lg font-semibold text-blue-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="mt-6 w-full max-w-lg">
            <div class="text-center mb-4">
                {{ $posts->Links() }}
            </div>
            <div class="text-center text-gray-500 text-sm">
                {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results
            </div>
        </div>
    </div>
</x-app-layaout>


