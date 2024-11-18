
@php
    $isHomeEnable = Route::currentRouteName() === 'home' ? 'text-blue-600 dark:text-blue-500' : 'dark:text-white text-gray-600 dark:text-gray-500';
    $isPublicEnable = Route::currentRouteName() === 'public' ? 'text-blue-600 dark:text-blue-500' : 'dark:text-white text-gray-600 dark:text-gray-500';
    $isContacEnable = Route::currentRouteName() === 'contacto' ? 'text-blue-600 dark:text-blue-500' : 'dark:text-white text-gray-600 dark:text-gray-500';
@endphp

<!DOCTYPE html>
<html lang="sp" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="" href="https://mangusprod.s3.us-east-2.amazonaws.com/talentotechoriente/tenancy/pictures/xUubH9uXhC.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIA2ULGKIBMK3NU2DW3%2F20241110%2Fus-east-2%2Fs3%2Faws4_request&amp;X-Amz-Date=20241110T012834Z&amp;X-Amz-Expires=604800&amp;X-Amz-Signature=4df7838515a94e16673c300a5a4a56677c6f6d24b57e13f8b1cdd7a12cb4e183&amp;X-Amz-SignedHeaders=host">
    <title> {{ $title ?? 'Title' }} </title>
</head>

<body class="mt-16 min-h-screen dark">
    <header>
        <!-- Barra de navegación fija en la parte superior -->
        <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full z-50">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
                <a href="https://www.instagram.com/andrexito.vip/"
                    class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://mangusprod.s3.us-east-2.amazonaws.com/talentotechoriente/tenancy/pictures/jfBc-Xv3y.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIA2ULGKIBMK3NU2DW3%2F20241110%2Fus-east-2%2Fs3%2Faws4_request&X-Amz-Date=20241110T012834Z&X-Amz-Expires=604800&X-Amz-Signature=b74173feaa23b2ed1e07261528482da1263397ef9695d4a3e2da01e0d7772b4c&X-Amz-SignedHeaders=host"
                        class="h-8" alt="Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                        style="margin: 0">TalentoTech</span>
                </a>
                <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <a href="{{ route('login') }}"
                        class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Login</a>
                    <a href="{{ route('singup') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign
                        up</a>
                </div>
                <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block py-2 px-3 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 {{ $isHomeEnable }}"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('public') }}"
                                class="block py-2 px-3 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 {{ $isPublicEnable}}">Cursos</a>
                        </li>
                        <li>
                            <a href="{{ route('contacto') }}"
                                class="block py-2 px-3 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 {{ $isContacEnable }}">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
