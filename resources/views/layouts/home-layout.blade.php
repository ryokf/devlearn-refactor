<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DNCC Learning Platform</title>

    <script src="https://kit.fontawesome.com/c473da0646.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="./landingpage/css/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="./landingpage/vendors/slick/slick.css" />
    <link rel="stylesheet" href="./landingpage/vendors/slick/slick-theme.css" />

    <!-- Swiper CSS -->
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Style -->
    <link rel="stylesheet" href="./landingpage/css/style.css" />


    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500&display=swap" rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="{{ asset('landingpage/images/logo_dl.png') }}">
</head>

<body class="font-poppins text-gray-800 overflow-x-hidden dark:bg-zinc-800" id="top">
    <!-- Start Navbar -->
    <nav class="bg-white shadow p-4 sticky top-0 z-50 dark:bg-zinc-800">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <!-- nav -->
                <div class="flex justify-center items-center text-slate-800">
                    <div class="min-w-max inline-flex relative">
                        <a href="/">
                            <img src="{{ asset('landingpage/images/logo_dl.png') }}" class="w-full h-12 dark:hidden"
                                alt="" />
                            <img src="{{ asset('landingpage/images/logo_dl_dark.png') }}"
                                class="w-full h-12 dark:flex hidden" alt="" />
                        </a>
                    </div>
                    <!-- kategori -->
                    <div class="hidden md:block ml-10 group relative dark:text-white">
                        <a href="#categories">Kategori</a>
                        <div class="hidden absolute group-hover:block min-w-[200px] pt-8 drop-shadow-md ">
                            <ul class="list-none rounded-lg overflow-hidden">
                                @foreach ($categories as $category)
                                    <li class="">
                                        <a href="{{ route('category.show', [$category->id]) }}"
                                            class="block text-sm bg-white hover:bg-slate-50 py-4 px-8 hover:text-blue-600 dark:bg-zinc-800 dark:hover:bg-zinc-700">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- langganan -->
                    <div class="hidden md:block ml-10 group relative dark:text-white">
                        <a href="#mentor">Mentor</a>
                    </div>
                </div>

                <!-- searchbar -->
                <div class="hidden md:block w-[25%] lg:block lg:w-[45%] relative">
                    <span class="absolute left-5 top-3.5 text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <form action="{{ route('course.search') }}">
                        <input type="search" name="search"
                            class="transition w-full text-xs rounded-full border border-gray-500 p-4 pl-12 bg-slate-100 outline-none"
                            placeholder="Cari Materi.." />
                    </form>
                </div>

                <!--  masuk, daftar -->
                <div class="flex my-auto pr-0 md:pr-5">
                    <!-- tombol switch theme -->
                    <div class="flex hidden md:block relative pr-5 pt-2.5">
                        <div class="flex">
                            <input type="checkbox" class="hidden" id="dark-toggle" />
                            <label for="dark-toggle">
                                <div
                                    class="flex h-7 w-14 cursor-pointer items-center rounded-full bg-blue-600 p-l dark:bg-white">
                                    <div
                                        class="toggle-icon fa fa-sun h-4 w-4 text-white transition duration-300 ease-in-out pl-1 dark:text-slate-800">
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- end tombol switch theme -->

                    @if (Auth::user())
                        <!-- dropdown avatar -->
                        <div class=" relative">
                            <div x-data="{ open: false }" class="w-full inline-flex flex  items-center">
                                <!-- close -->
                                <div @click="open = !open" class="relative border-b-4 border-transparent ">
                                    <div class="flex justify-center items-center space-x-3 cursor-pointer">
                                        <div
                                            class="w-10 h-10 rounded-full overflow-hidden border-2  border-slate-800 hover:opacity-90 dark:border-white">
                                            <img src="{{ asset('landingpage/images/course1.png') }}" alt=""
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="text-slate-800 mx-auto font-semibold dark:text-white">
                                            <div class="cursor-pointer hidden md:block">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- open -->
                                    <div x-show="open"
                                        class="absolute w-50 bg-white shadow-md border dark:border-transparent  dark:bg-zinc-800 mt-3 hidden md:block rounded-lg overflow-hidden"
                                        x-transition:enter="transition ease-out origin-top-left duration-200"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition origin-top-left ease-in duration-100"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90">
                                        <!-- dropdown -->
                                        <ul class="list-none">
                                            <li>
                                                <a href="{{ route('dashboard') }}"
                                                    class="block text-sm bg-white hover:bg-slate-50 hover:text-blue-500 py-3 pr-6 pl-5 flex gap-2 dark:bg-zinc-800 dark:text-white dark:hover:bg-zinc-700 dark:hover:text-blue-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                    Dashboard
                                                </a>
                                            </li>

                                            <li>
                                                @csrf
                                                <button data-modal-target="popup-modal-logout"
                                                    data-modal-toggle="popup-modal-logout"
                                                    class="block text-sm bg-white hover:bg-slate-50 py-3 pr-6 pl-5 flex gap-2 hover:border-red-600 hover:text-red-600 w-full dark:text-white dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:hover:text-red-500"
                                                    type="button">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                        </path>
                                                    </svg>
                                                    Keluar
                                                </button>

                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- open mobile -->
                                <div x-show="open"
                                    class="bg-white absolute top-10 mt-5 right-0 text-left shadow overflow-y block md:hidden"
                                    x-transition:enter="transition ease-out origin-top-left duration-200"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition origin-top-left ease-in duration-100"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-90">
                                    <ul class="list-none">
                                        <li>
                                            <a href="{{ route('dashboard') }}"
                                                class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                                class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                Pengaturan
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="border-slate-200 mx-4">

                                            @csrf
                                            <button data-modal-target="popup-modal-logout"
                                                data-modal-toggle="popup-modal-logout"
                                                class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4 hover:border-red-600 text-red-600 w-full"
                                                type="button">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                Keluar
                                            </button>

                                        </li>

                                    </ul>

                                </div>


                            </div>

                            <!-- button masuk -->
                        @else
                            <div class="hidden md:block relative mt-2.5">
                                <a href="{{ route('login') }}"
                                    class="inline-flex items-center w-full px-6 py-1 rounded-lg ml-2 font-medium text-sm text-black align-middle bg-gray-200 dark:bg-gray-100 border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-gray-300 dark:hover:bg-gray-200 focus-within:bg-slate-800 focus-within:border-slate-800">
                                    Masuk
                                </a>
                            </div>


                            <!-- button daftar -->
                            <div class="hidden md:block relative mt-2.5">
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center w-full px-6 py-1 rounded-lg ml-2 font-medium text-sm text-white align-middle bg-blue-600 select-none sm:mb-0 sm:w-auto hover:opacity-95">
                                    Daftar
                                </a>
                            </div>
                    @endif
                </div>

                <!-- nav toggle mobile -->
                <div class="flex md:hidden cursor-pointer my-auto ml-2">
                    <span class="navbar-toggle text-slate-900 flex-end dark:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </span>
                    <span class="navbar-toggle text-white flex-end dark:flex hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <!-- mobile nav -->
        <div
            class="mobile-navbar hidden h-[102vh] bg-white absolute top-0 left-0 text-left shadow overflow-y dark:bg-zinc-800">
            <div class="p-3">
                <!-- search bar -->
                <div class="relative mt-3">
                    <span class="absolute left-3 top-1.5 text-slate-600 dark:text-slate-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <input type="search"
                        class="transition w-full text-xs rounded-full border border-slate-800 p-2 pl-10 bg-slate-100 outline-none dark:text-white"
                        placeholder="Cari Materi.." />
                </div>
                <ul class="mt-3 list-none">
                    <li class="py-3">
                        <div class="flex justify-between w-full items-center" onclick="dropDown()">
                            <span class="text-[15px] ml-2 text-slate-800 font-semibold dark:text-white">Kategori</span>
                            <span class="text-sm rotate-180" id="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 dark:hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                            <span class="text-sm rotate-180" id="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 dark:text-white dark:flex hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                        <div class="text-left text-sm font-normal text-slate-800 mt-1 w-4/5 mx-auto dark:text-white"
                            id="submenu">
                            <ul class="list-none">
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600 dark:bg-zinc-800 dark:hover:bg-slate-700 dark:hover:text-blue-500">
                                        Web Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600 dark:bg-zinc-800 dark:hover:bg-slate-700 dark:hover:text-blue-500">
                                        Mobile Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600 dark:bg-zinc-800 dark:hover:bg-slate-700 dark:hover:text-blue-500">
                                        Game Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600 dark:bg-zinc-800 dark:hover:bg-slate-700 dark:hover:text-blue-500">
                                        Data Analyst
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600 dark:bg-zinc-800 dark:hover:bg-slate-700 dark:hover:text-blue-500">
                                        Jaringan
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600 dark:bg-zinc-800 dark:hover:bg-slate-700 dark:hover:text-blue-500">
                                        Multimedia
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="py-3">
                        <div class="flex justify-between w-full items-center">
                            <span class="text-[15px] ml-2 text-slate-800 font-semibold dark:text-white">Mentor</span>
                            <span class="text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3 h-3 dark:hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </span>
                            <span class="text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-3 h-3 dark:text-white dark:flex hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </span>
                        </div>
                    </li>
                </ul>
                @if (!Auth::user())
                    <div class="flex gap-3 mt-5">
                        <!-- masuk -->
                        <div class="relative">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center w-full px-6 py-2 rounded-full text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800 dark:text-slate-800 dark:border-white">
                                Masuk
                            </a>
                        </div>
                        <!-- daftar -->
                        <div class="relative">
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center w-full px-6 py-2 rounded-full text-base font-semibold text-white align-middle bg-slate-800 border select-none sm:mb-0 sm:w-auto hover:opacity-80 text-center dark:border-white">
                                Daftar
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    @yield('body')

    <!-- Start Footer Section -->
    <footer class="bg-gray-100 dark:bg-zinc-800">
        <div class="mx-auto container space-y-8 py-16 lg:space-y-16">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 ">
                <div>
                    <div class="h-12">
                        <img src="{{ asset('landingpage/images/logoDL.png') }}" class="w-28 dark:hidden"
                            alt="" />
                        <img src="{{ asset('landingpage/images/logoDL-dark.png') }}"
                            class="w-28 h-15 dark:flex hidden" alt="" />
                    </div>
                    <p class="mt-8 max-w-xs text-slate-500 text-sm pt-3 dark:text-white">
                        <b>Basecamp DNCC</b>
                        <br>
                        Jl. Nakula 1 No.5-11, Pendrikan Kidul,
                        Kec. Semarang Tengah, Kota Semarang,
                        Jawa Tengah 50131
                    </p>

                    <ul class="mt-8 flex gap-6">

                        <li>
                            <a href="https://www.instagram.com/dnccsemarang/?hl=id" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                <span class="sr-only">Instagram</span>

                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.youtube.com/channel/UCbGj3OU4Qq8KOgaY9zuyZsA" rel="noreferrer"
                                target="_blank" class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                <span class="sr-only">YouTube</span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="https://github.com/dnccsemarang" rel="noreferrer" target="_blank"
                                class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                <span class="sr-only">GitHub</span>

                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-2 gap-8 lg:col-span-2 md:grid-cols-3">
                    <!-- tentang kami -->
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white dark:font-bold">Tentang Kami</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                    Mulai Belajar
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                    Lihat Semua Kursus
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                    Kontak Kami
                                </a>
                            </li>

                            <li>
                                <a href="https://dnccudinus.org/"
                                    class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                    Website Resmi DNCC
                                </a>
                            </li>

                            <li>
                                <a href="https://dinus.ac.id/"
                                    class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                    Website Resmi Universitas
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- kategori -->
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white dark:font-bold">Kategori</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('category.show', [$category->id]) }}"
                                        class="text-gray-700 transition hover:opacity-75 dark:text-white">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach



                        </ul>
                    </div>

                    <!-- developer -->
                    <div>
                        <p class="font-medium text-gray-900 dark:text-white dark:font-bold">Tentang Developer</p>

                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="https://github.com/ryokf"
                                    class="text-gray-700 transition hover:opacity-75 flex items-center text-sm dark:text-white">
                                    <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Ryo Khrisna Fitriawan
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/rmarioapn3"
                                    class="text-gray-700 transition hover:opacity-75 flex items-center text-sm dark:text-white">
                                    <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Mario Aprilnino Prasetyo
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/taliyameyswara"
                                    class="text-gray-700 transition hover:opacity-75 flex items-center text-sm dark:text-white">
                                    <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Taliya Meyswara
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/isnanramalia"
                                    class="text-gray-700 transition hover:opacity-75 flex items-center text-sm dark:text-white">
                                    <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Isna Nur Amalia
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <p class="text-xs text-gray-500 text-center dark:text-white-500">
                &copy; 2023. DNCC. All rights reserved.
            </p>
        </div>
    </footer>
    <!-- End Footer Section -->

    {{-- start modal logout --}}
    <div id="popup-modal-logout" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-sm max-h-full">
            <div class="relative bg-white rounded-xl shadow dark:bg-gray-800">
                <div class="px-0 pt-6 pb-0 text-center dark:text-white">
                    <h1 class="text-center my-2 text-xl font-medium">Logout</h1>
                    <h3 class="mb-5 mt-2 text-sm font-normal text-gray-500 dark:text-gray-400">anda yakin ingin melakukan
                        logout?</h3>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        {{-- <button type="submit"
                            class="text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            iyah
                        </button> --}}
                        <div class="w-full p-2 flex gap-2">
                            <button data-modal-hide="popup-modal-logout" type="button"
                            class="w-full overflow-hidden rounded-lg text-gray-500  bg-gray-200 hover:bg-gray-100 focus:ring-4 text-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            <div class=" bg-gray-200 px-5 py-2 rounded-lg dark:bg-gray-700">
                                batal
                            </div>
                        </button>
                        <button type="submit"
                            class="w-full overflow-hidden z-50 text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm  hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            <div class="bg-red-600 px-5 py-2 text-white ">
                                keluar
                            </div>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal logout --}}

    {{-- flowbite script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

    <!-- Scripts -->
    <!-- Jquery JS -->
    <script src="{{ asset('landingpage/vendors/jquery/jquery-3.6.0.min.js') }}"></script>

    <!-- Slick Carousel JS -->
    <script src="{{ asset('landingpage/vendors/slick/slick.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('landingpage/js/main.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function dropDown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }
        dropDown();

        function Openbar() {
            document.querySelector(".sidebar").classList.toggle("left-[-300px]");
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-container', {
                autoplay: {
                    delay: 8000,
                },
                breakpoints: {
                    640: {
                        centeredSlides: true,
                        slidesPerView: 1.25,
                    },
                    1024: {
                        centeredSlides: false,
                        slidesPerView: 1.5,
                    },
                },
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
            })
        })

        var swiper2 = new Swiper(".swiper-container-2", {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
                520: {
                    slidesPerView: 2,
                    spaceBetween: 50,
                },
                950: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    </script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });

            Alpine.data('accordion', (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ?
                        `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })
    </script>

    <style>
        .nav-btn {
            color: black;
            height: 50px;
            width: 50px;
            /* margin-inline: -10px; */
        }

        .nav-btn::after,
        .nav-btn::before {
            font-size: 20px !important;
            font-weight: bolder;
        }
    </style>
</body>

</html>
