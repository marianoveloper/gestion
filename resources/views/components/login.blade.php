<x-jet-validation-errors class="mb-4" />

@if (session('status'))
<div class="mb-4 text-sm font-medium text-green-600">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2"
            style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')">
        </div>

        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">

            <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Brand</h2>

            <p class="text-xl text-center text-gray-600 dark:text-gray-200">Welcome back!</p>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="email" >Email
                    </label>
                <input id="email"
                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    type="email" :value="old('email')" required autofocus >
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                        for="password">Password</label>
                        @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <input id="password"
                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="mt-8">
                <button type="submit"
                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-green-800 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">
                    Ingresar
                </button>
            </div>


        </div>
    </div>
</form>
