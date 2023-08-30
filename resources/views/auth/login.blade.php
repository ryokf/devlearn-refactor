@extends('layouts.home-layout')
@section('body')
    <section class="bg-white dark:bg-zinc-800">
        <main
            class="flex items-center justify-center px-8 py-8 py-20 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">

            <div class="max-w-xl lg:max-w-3xl">
                <div class="relative justify-center block my-auto lg:hidden lg:text-center">
                    <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl dark:text-white">
                        Masuk Akun DNCC Learn
                    </h1>
                </div>

                <form method="POST" action="{{ route('login') }}" class="grid grid-cols-6 gap-6 mt-8">
                    @csrf

                    <div class="col-span-12">
                        <label for="Email" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Email
                        </label>

                        <input type="email" id="Email" name="email"
                            class="w-full mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm dark:bg-zinc-800" />
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-12">
                        <label for="Password" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Password
                        </label>

                        <div class="relative ">
                            <input type="password" id="Password" name="password"
                                class="w-full mt-1 text-sm text-gray-700 bg-white border-gray-200 rounded-md shadow-sm dark:text-white dark:bg-zinc-800" />
                            <button type="button" id="togglePassword"
                                class="absolute text-gray-500 transform -translate-y-1/2 top-1/2 right-4 focus:outline-none">
                                <i class="hidden fas fa-eye"></i>
                                <i class=" fas fa-eye-slash"></i>
                            </button>
                        </div>

                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-12">
                        <button type="submit"
                            class="inline-block w-full px-12 py-3 mx-auto text-sm font-medium text-white rounded-md shrink-0 bg-slate-800 hover:bg-slate-700 dark:bg-zinc-200 dark:text-black">
                            Masuk
                        </button>
                        <div class="sm:flex sm:items-center sm:gap-4">
                            <p class="mt-4 text-sm text-gray-500 sm:mt-0 dark:text-white">
                                Belum punya akun?
                                <a href="{{ route('register') }}"
                                    class="text-gray-700 underline dark:text-gray-300">Daftar</a>.
                            </p>
                        </div>

                    </div>
                </form>
            </div>
        </main>
    </section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('Password');
        const toggleButton = document.getElementById('togglePassword');

        if (toggleButton && passwordInput) {
            toggleButton.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.querySelector('.fa-eye-slash').classList.add('hidden');
                    toggleButton.querySelector('.fa-eye').classList.remove('hidden');
                } else {
                    passwordInput.type = 'password';
                    toggleButton.querySelector('.fa-eye-slash').classList.remove('hidden');
                    toggleButton.querySelector('.fa-eye').classList.add('hidden');
                }
            });
        }
    });
</script>
