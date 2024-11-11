<x-app-layaout>
    <x-slot name='title'>TalentoTech | Show</x-slot>
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto my-8">
        <h1 class="text-purple-950 text-5xl font-extrabold mb-6">{{ $post->title }}</h1>
        <h2 class="text-purple-800 text-2xl font-semibold mb-4">{{ $post->category }}</h2>
        <p class="text-gray-700 text-lg leading-relaxed">{{ $post->content }}</p>
    </div>
</x-app-layaout>
