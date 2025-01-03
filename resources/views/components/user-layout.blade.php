@php
    $isHomeEnable = Route::currentRouteName() === 'home'
        ? 'block py-2 px-3 text-blue-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-blue-400'
        : 'block py-2 px-3 text-gray-600 hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-gray-400';

    $isCourseEnable = Route::currentRouteName() === 'course.index'
        ? 'block py-2 px-3 text-blue-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-blue-400'
        : 'block py-2 px-3 text-gray-600 hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-gray-400';
@endphp

<!DOCTYPE html>
<html lang="sp" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type=""
        href="https://mangusprod.s3.us-east-2.amazonaws.com/talentotechoriente/tenancy/pictures/xUubH9uXhC.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIA2ULGKIBMK3NU2DW3%2F20241110%2Fus-east-2%2Fs3%2Faws4_request&amp;X-Amz-Date=20241110T012834Z&amp;X-Amz-Expires=604800&amp;X-Amz-Signature=4df7838515a94e16673c300a5a4a56677c6f6d24b57e13f8b1cdd7a12cb4e183&amp;X-Amz-SignedHeaders=host">
    <title> {{ $title ?? 'Title' }} </title>
</head>

<body class="min-h-screen dark">
    <header>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://www.instagram.com/andrexito.vip/"
                    class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://mangusprod.s3.us-east-2.amazonaws.com/talentotechoriente/tenancy/pictures/jfBc-Xv3y.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIA2ULGKIBMK3NU2DW3%2F20241110%2Fus-east-2%2Fs3%2Faws4_request&X-Amz-Date=20241110T012834Z&X-Amz-Expires=604800&X-Amz-Signature=b74173feaa23b2ed1e07261528482da1263397ef9695d4a3e2da01e0d7772b4c&X-Amz-SignedHeaders=host"
                        class="h-8" alt="Logo" />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TalentoTech</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse relative">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full object-cover" src="{{ asset($profile->foto_perfil) }}"
                            alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="absolute hidden top-10 right-0 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white"> {{ $user->name ?? 'UserName' }}
                            </span>
                            <span class="block text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $user->email ?? 'UserEmail' }} </span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li><a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li><a href="  {{ route('index.settings') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>
                            <li><a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                            </li>
                            <li><a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li><a href=" {{ route('home') }} " class="{{ $isHomeEnable }}" aria-current="page">Home</a>
                        </li>
                        <li><a href=" {{ route('course.index') }} "
                                class="{{ $isCourseEnable }}">Course</a>
                        </li>
                        <li><a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li><a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                        </li>
                        <li><a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Obtener el botón y el menú
                const userMenuButton = document.getElementById("user-menu-button");
                const userDropdown = document.getElementById("user-dropdown");

                // Escuchar el evento de clic en el botón
                userMenuButton.addEventListener("click", function(event) {
                    event.stopPropagation(); // Evita que el clic cierre el menú
                    userDropdown.classList.toggle("hidden");
                });

                // Cerrar el menú si se hace clic fuera de él
                document.addEventListener("click", function(event) {
                    if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                        userDropdown.classList.add("hidden");
                    }
                });
            });
        </script>
    </header>

    <main class="min-h-screen">

        {{ $slot }}

    </main>

    <footer class="bg-blue-600 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ now()->year }} TalentoTech. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>
