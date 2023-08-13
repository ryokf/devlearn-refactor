@extends('layouts.home-layout')
@section('body')
    <section class="bg-white">
        <main
            class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6 py-20">

            <div class="max-w-xl lg:max-w-3xl">
                <div class="relative my-auto block lg:hidden lg:text-center justify-center">
                    <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                        Masuk Akun DNCC Learn
                    </h1>
                </div>

                <form method="POST" action="{{ route('login') }}" class="mt-8 grid grid-cols-6 gap-6">
                    @csrf

                    <div class="col-span-12">
                        <label for="Email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>

                        <input type="email" id="Email" name="email"
                            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-12">
                        <label for="Password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>

                        <input type="password" id="Password" name="password"
                            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-12">
                        <button
                            class="mx-auto inline-block shrink-0 rounded-md bg-slate-800 hover:bg-slate-700 px-12 py-3 text-sm font-medium text-white w-full">
                            Masuk
                        </button>
                        <div class="sm:flex sm:items-center sm:gap-4">
                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="text-gray-700 underline">Daftar</a>.
                        </div>
                        </p>
                    </div>
                </form>
            </div>
        </main>
    </section>
@endsection
