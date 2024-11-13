<x-app-layaout>
    <x-slot name='title'>TalentoTech | Sing Up</x-slot>

    <section class="bg-white-50 dark:bg-white-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-center text-2xl font-semibold text-gray-900 dark:text-white mt-10">
                    <img class="w-8 h-8 mr-2"
                        src="https://mangusprod.s3.us-east-2.amazonaws.com/talentotechoriente/tenancy/pictures/xUubH9uXhC.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIA2ULGKIBMK3NU2DW3%2F20241110%2Fus-east-2%2Fs3%2Faws4_request&amp;X-Amz-Date=20241110T012834Z&amp;X-Amz-Expires=604800&amp;X-Amz-Signature=4df7838515a94e16673c300a5a4a56677c6f6d24b57e13f8b1cdd7a12cb4e183&amp;X-Amz-SignedHeaders=host"
                        alt="logo">
                </div>
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action=" {{ route('singupvalidate') }} " method="POST">

                        @csrf

                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                @error('name') border-orange-400 focus:border-orange-400 focus:ring-orange-400 @else border-gray-300 dark:border-gray-600 @enderror"
                                placeholder="name" required>
                            @error('name')
                                <p class="mt-2 text-sm text-orange-400 dark:text-orange-400"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                @error('email') border-orange-400 focus:border-orange-400 focus:ring-orange-400 @else border-gray-300 dark:border-gray-600 @enderror"
                                placeholder="name@company.com" required>

                            @error('email')
                                <p class="mt-2 text-sm text-orange-400 dark:text-orange-400"> {{ $message }} </p>
                            @enderror

                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
        @error('password') border-orange-400 focus:border-orange-400 focus:ring-orange-400 @else border-gray-300 dark:border-gray-600 @enderror"
                                required>
                            @error('password')
                                <p class="mt-2 text-sm text-orange-400 dark:text-orange-400"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
        @error('password_confirmation') border-orange-400 focus:border-orange-400 focus:ring-orange-400 @else border-gray-300 dark:border-gray-600 @enderror"
                                required>
                            @error('password_confirmation')
                                <p class="mt-2 text-sm text-orange-400 dark:text-orange-400"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" name="terms"
                                    class="w-4 h-4 border text-gray-900 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800
                                    @error('terms') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 @enderror"
                                    required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the
                                    <a class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                                        href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        @error('terms')
                            <p class="mt-2 text-sm text-orange-400 dark:text-orange-400"> {{ $message }} </p>
                        @enderror

                        <button type="submit"
                            class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 transition duration-300">Create
                            an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href=" {{ route('login') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-app-layaout>
