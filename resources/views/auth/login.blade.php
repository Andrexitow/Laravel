<x-app-layout>
    <x-slot name="title">TalentoTech | Login</x-slot>

    <!-- Alerta de éxito -->
    @if (session('success'))
        <div id="success-alert" class="flex items-center p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
            <img src="{{ asset('images/icons-check.gif') }}" alt="Success" class="w-8 h-8 mr-3">
            <span class="text-lg font-semibold">{{ session('success') }}</span>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 5000);
        </script>
    @endif

    
    <div class="flex flex-col items-center justify-center px-6 mx-auto md:h-screen lg:py-0">
        <!-- Alerta de sesión expiró -->
        @if (session('session_expired'))
            <div class="flex justify-center mb-4">
                <div class="w-full max-w-md bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg">
                    <strong class="font-bold">¡Oops!</strong> {{ session('session_expired') }}
                </div>
            </div>
        @endif
        <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-center text-2xl font-semibold text-gray-900 dark:text-white mt-10">
                <img class="w-8 h-8 mr-2" src="https://mangusprod.s3.us-east-2.amazonaws.com/talentotechoriente/tenancy/pictures/xUubH9uXhC.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIA2ULGKIBMK3NU2DW3%2F20241110%2Fus-east-2%2Fs3%2Faws4_request&amp;X-Amz-Date=20241110T012834Z&amp;X-Amz-Expires=604800&amp;X-Amz-Signature=4df7838515a94e16673c300a5a4a56677c6f6d24b57e13f8b1cdd7a12cb4e183&amp;X-Amz-SignedHeaders=host" alt="logo">
            </div>

            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Login to your account
                </h1>

                <form class="space-y-4 md:space-y-6" action="{{ route('login_validate') }}" method="POST">
                    @csrf

                    <!-- Campo de Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="example@gmail.com" required>
                    </div>

                    <!-- Campo de Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="••••••••" required>
                    </div>

                    <!-- Recordar sesión -->
                    <div class="flex justify-between items-center mb-5">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" />
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>

                    <!-- Botón de login -->
                    <button type="submit"
                        class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 transition duration-300">
                        Login
                    </button>

                    <!-- Enlace de olvido de contraseña -->
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Olvidaste la contraseña? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Recuperar</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
