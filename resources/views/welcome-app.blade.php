<x-app-layout>
    <x-slot name='title'>TalentoTech | Home</x-slot>

    

    <div class="relative min-h-screen bg-gray-50">
        <div class="relative bg-cover bg-center h-[80vh]"
            style="background-image: url('{{ asset('images/img1.png') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center">
                <div class="text-center text-white px-6 max-w-4xl">
                    <h1 class="text-6xl md:text-7xl font-extrabold leading-tight">¡Bienvenido a TalentoTech!</h1>
                    <p class="mt-6 text-2xl md:text-3xl font-light">
                        Explora cursos, desarrolla tus habilidades y únete a nuestra comunidad.
                    </p>
                    <a href="{{ route('public') }}"
                        class="mt-10 inline-block bg-blue-600 hover:bg-blue-700 text-white px-12 py-5 rounded-full text-2xl font-bold shadow-lg">
                        Ver Cursos
                    </a>
                </div>
            </div>
        </div>

        <section class="relative py-24 px-6 bg-gradient-to-br from-blue-50 to-white">
            <div class="relative z-10 max-w-6xl mx-auto text-center">
                <h2 class="text-5xl font-extrabold text-gray-800 mb-6">
                    ¿Qué es <span class="text-blue-600">TalentoTech</span>?
                </h2>
                <p class="text-gray-700 text-lg leading-relaxed max-w-3xl mx-auto">
                    TalentoTech es la plataforma ideal para aprender nuevas habilidades y conectar con expertos en
                    distintas áreas.
                    Ya sea que desees convertirte en un profesional o expandir tus conocimientos, tenemos algo para ti.
                </p>
                <div class="mt-12 flex justify-center space-x-6">
                    <a href="{{ route('public') }}"
                        class="inline-block px-8 py-4 text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-lg font-semibold shadow-lg">
                        Explorar Cursos
                    </a>
                    <a href="{{ route('contacto') }}"
                        class="inline-block px-8 py-4 text-blue-600 border border-blue-600 hover:bg-blue-50 rounded-lg text-lg font-semibold">
                        Más Información
                    </a>
                </div>
            </div>
            <div class="absolute inset-x-0 -bottom-1 z-0">
                <svg class="w-full h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#f9fafb" fill-opacity="1"
                        d="M0,224L60,218.7C120,213,240,203,360,197.3C480,192,600,192,720,197.3C840,203,960,213,1080,202.7C1200,192,1320,160,1380,144L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                    </path>
                </svg>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-20 px-6 bg-gray-50">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
                {{-- Feature 1 --}}
                <div class="text-center bg-white shadow-lg rounded-lg p-8 transition-transform hover:scale-105">
                    <div class="text-blue-500 text-6xl mb-4">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Aprende de Expertos</h3>
                    <p class="text-gray-600 mt-4">
                        Accede a contenido creado por profesionales reconocidos en sus áreas.
                    </p>
                </div>
                {{-- Feature 2 --}}
                <div class="text-center bg-white shadow-lg rounded-lg p-8 transition-transform hover:scale-105">
                    <div class="text-blue-500 text-6xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Conecta con Otros</h3>
                    <p class="text-gray-600 mt-4">
                        Únete a una comunidad de estudiantes y profesionales como tú.
                    </p>
                </div>
                {{-- Feature 3 --}}
                <div class="text-center bg-white shadow-lg rounded-lg p-8 transition-transform hover:scale-105">
                    <div class="text-blue-500 text-6xl mb-4">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Certificaciones</h3>
                    <p class="text-gray-600 mt-4">
                        Obtén certificados que validan tus conocimientos y logros.
                    </p>
                </div>
            </div>
        </section>

        {{-- Call to Action --}}
        <section class="py-20 bg-blue-600 text-white">
            <div class="max-w-6xl mx-auto text-center px-4">
                <h2 class="text-4xl font-bold mb-6">¡Comienza hoy mismo!</h2>
                <p class="text-lg leading-relaxed mb-8">
                    Crea tu cuenta y accede a cientos de cursos diseñados para ti. Aprende a tu ritmo y mejora tu
                    futuro.
                </p>
                <a href="{{ route('singup') }}"
                    class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg text-lg font-semibold shadow-lg hover:shadow-xl transition">
                    Regístrate Ahora
                </a>
            </div>
        </section>

</x-app-layout>
