@extends('layouts.home-layout')
@section('body')
    <div class="font-poppins text-gray-800 overflow-x-hidden" id="top">
        <section class="bg-white">
            <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
                <section class="relative bg-slate-800 lg:col-span-5 lg:h-full xl:col-span-6 flex items-center">
                    <img alt="Night" src="./landingpage/images/heroimage.jpeg"
                        class="absolute h-full w-full object-cover opacity-50" />

                    <div class="hidden lg:relative lg:block lg:p-20">
                        <a class="text-white" href="/">
                            <span class="sr-only">Home</span>
                            <h2 class="font-bold text-6xl">
                                DNCC
                            </h2>
                            <h2 class="font-semibold text-4xl pb-3 md:pb-0">Learning Platfrom</h2>
                        </a>

                        <p class="mt-4 leading-relaxed text-white/90">
                            "Unlock Your Potential: Join the Learning Revolution!"
                        </p>
                    </div>
                </section>

                <main
                    class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">

                    <div class="max-w-md">
                        <div class="text-5xl font-dark font-bold">404</div>
                        <p class="text-2xl md:text-3xl font-light leading-normal">Sorry we couldn't find this page. </p>
                        <p class="mb-8">But dont worry, you can find plenty of other things on our homepage.</p>
                        <a href="{{ route('homepage') }}">
                            <button id=""
                                class="px-4 inline py-2 text-sm font-medium leading-5 shadow text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-blue bg-blue-600 active:bg-blue-600 hover:bg-blue-700">back
                                to homepage</button>
                        </a>

                    </div>
                </main>
            </div>
        </section>
    </div>
    <!-- Scripts -->
@endsection
