<x-app-layaout>
    <x-slot name='title'>TalentoTech | Publicaciones</x-slot>

    <ul class="space-y-4 mt-10">
        @foreach ($posts as $post)
            <li class="p-4 bg-white shadow rounded-lg hover:bg-gray-50 transition duration-200 ease-in-out">
                <a href="{{ route('show', ['post' => $post->id]) }}" class="text-lg font-semibold text-blue-600 hover:underline">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>
    

</x-app-layaout>
