<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DNCC Learning Platform</title>

    <script src="https://kit.fontawesome.com/c473da0646.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="./landingpage/css/font-awesome/css/all.min.css" />

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

    <link rel="icon" type="image/x-icon" href="landingpage/images/logo_dl.png">
</head>

<body class="font-poppins text-gray-800 overflow-x-hidden" id="top">
    <!-- Start Navbar -->
    <nav class="bg-white shadow p-4 sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <!-- nav -->
                <div class="flex justify-center items-center text-slate-800">
                    <div class="min-w-max inline-flex relative">
                        <a href="/">
                            <img src="landingpage/images/logo_dl.png" class="w-full h-12" alt="" />
                        </a>
                    </div>
                    <!-- kategori -->
                    <div class="hidden md:block ml-10 group relative">
                        <a href="#categories">Kategori</a>
                        <div
                            class="hidden border-gray-100 absolute group-hover:block min-w-[200px] pt-8 drop-shadow-md">
                            <ul class="list-none">
                                <li>
                                    @foreach ($categories as $category)
                                        <a href="{{ route('category.show', [$category->id]) }}"
                                            class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </li>

                            </ul>
                        </div>
                    </div>

                    <!-- langganan -->
                    <div class="hidden md:block ml-10 group relative">
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
                    <input type="search"
                        class="transition w-full text-xs rounded-full border border-slate-800 p-4 pl-12 bg-slate-100 outline-none"
                        placeholder="Cari Materi.." />
                </div>

                <!--  masuk, daftar -->
                <div class="flex my-auto pr-0 md:pr-5">

                    @if (Auth::user())
                        <!-- dropdown avatar -->
                        <div class="relative">
                            <div x-data="{ open: false }" class="w-full inline-flex flex  items-center">
                                <!-- close -->
                                <div @click="open = !open"
                                    class="relative border-b-4 border-transparent "
                                    >
                                <div class="flex justify-center items-center space-x-3 cursor-pointer">
                                <div class="w-10 h-10 rounded-full overflow-hidden border-2  border-slate-800 hover:opacity-90">
                                    <img src="landingpage/images/course1.png" alt="" class="w-full h-full object-cover">
                                </div>
                                <div class="text-slate-800 mx-auto font-semibold">
                                    <div class="cursor-pointer hidden md:block">
                                      {{ Auth::user()->name }}
                                    </div>
                                </div>
                            </div>
                            <!-- open -->
                        <div x-show="open" class="absolute w-50 py-2 bg-white  shadow-md border dark:border-transparent mt-3 hidden md:block"
                        x-transition:enter="transition ease-out origin-top-left duration-200"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition origin-top-left ease-in duration-100"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        >
                            <!-- dropdown -->
                            <ul class="list-none">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        Pengaturan
                                    </a>
                                </li>
                                <li>
                                <hr class="border-slate-200 mx-4">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4 hover:border-red-600 text-red-600 w-full type="submit">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Keluar
                                    </button>
                                </form>
                                </li>

                            </ul>
                            </div>
                        </div>
                        <!-- open mobile -->
                        <div x-show="open" class="bg-white absolute top-10 mt-5 right-0 text-left shadow overflow-y block md:hidden"
                        x-transition:enter="transition ease-out origin-top-left duration-200"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition origin-top-left ease-in duration-100"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        >
                         <ul class="list-none">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        Pengaturan
                                    </a>
                                </li>
                                <li>
                                <hr class="border-slate-200 mx-4">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4 hover:border-red-600 text-red-600 w-full type="submit">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Keluar
                                    </button>
                                </form>
                                </li>

                            </ul>

                        </div>


                    </div>

                            <!-- button masuk -->
                        @else
                            <div class="hidden md:block relative">
                                <a href="{{ route('login') }}"
                                    class="inline-flex items-center w-full px-6 py-2 rounded-full ml-2 text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800">
                                    Masuk
                                </a>
                            </div>


                            <!-- button daftar -->
                            <div class="hidden md:block relative">
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center w-full px-6 py-2 rounded-full ml-2 text-base font-semibold text-white align-middle bg-slate-800 border select-none sm:mb-0 sm:w-auto hover:opacity-95">
                                    Daftar
                                </a>
                            </div>
                    @endif
                </div>

                <!-- nav toggle mobile -->
                <div class="flex md:hidden cursor-pointer my-auto ml-2">
                    <span class="navbar-toggle text-slate-900 flex-end">
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
        <div class="mobile-navbar hidden h-[102vh] bg-white absolute top-0 left-0 text-left shadow overflow-y">
            <div class="p-3">
                <!-- search bar -->
                <div class="relative mt-3">
                    <span class="absolute left-3 top-1.5 text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <input type="search"
                        class="transition w-full text-xs rounded-full border border-slate-800 p-2 pl-10 bg-slate-100 outline-none"
                        placeholder="Cari Materi.." />
                </div>
                <ul class="mt-3 list-none">
                    <li class="py-3">
                        <div class="flex justify-between w-full items-center" onclick="dropDown()">
                            <span class="text-[15px] ml-2 text-slate-800 font-semibold">Kategori</span>
                            <span class="text-sm rotate-180" id="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                        <div class="text-left text-sm font-normal text-slate-800 mt-1 w-4/5 mx-auto" id="submenu">
                        <ul class="list-none">
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600">
                                        Web Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600">
                                        Mobile Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600">
                                        Game Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600">
                                        Data Analyst
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600">
                                        Jaringan
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-2 hover:text-sky-600">
                                        Multimedia
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="py-3">
                        <div class="flex justify-between w-full items-center">
                            <span class="text-[15px] ml-2 text-slate-800 font-semibold">Mentor</span>
                            <span class="text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
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
                                class="inline-flex items-center w-full px-6 py-2 rounded-full text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800">
                                Masuk
                            </a>
                        </div>
                        <!-- daftar -->
                        <div class="relative">
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center w-full px-6 py-2 rounded-full text-base font-semibold text-white align-middle bg-slate-800 border select-none sm:mb-0 sm:w-auto hover:opacity-95 text-center">
                                Daftar
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Header / Hero Section -->
    <header class="text-center justify-center bg-no-repeat bg-cover"
        style="
        background-image: url('landingpage/images/heroimage.jpeg');
        background-attachment: fixed;
        background-position: center;
      ">
        <div class="w-full bg-slate-100 py-20 md:py-36 bg-opacity-90">
            <h2
                class="text-6xl font-black mb-1 pb-1 md:pb-0 from-sky-600 to-slate-800 bg-gradient-to-r bg-clip-text text-transparent">
                DNCC
            </h2>
            <h2 class="font-semibold text-4xl pb-3 md:pb-0">Learning Platfrom</h2>
            <p class="text-gray-500 my-3 px-0 md:px-40 md:mt-4 mt-1">
                "Unlock Your Potential: Join the Learning Revolution!"
            </p>
            <!-- button mulai belajar -->
            <a href="#categories"
                class="relative inline-flex items-center justify-center p-4 px-7 py-3 overflow-hidden font-medium text-slate-800 transition duration-300 ease-out border-2 border-slate-800 rounded-full group md:mt-5 mt-1">
                <span
                    class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-slate-800 group-hover:translate-x-0 ease">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </span>
                <span
                    class="absolute flex items-center justify-center w-full h-full text-slate-800 transition-all duration-300 transform group-hover:translate-x-full ease">Mulai
                    Belajar</span>
                <span class="relative invisible">Mulai Belajar</span>
            </a>
        </div>
    </header>
    <!-- End Header / Hero Section -->

    <!--  -->
    <section class="w-full py-10 bg-slate-50 lg:px-10">
        <div class="container mx-auto">
            <div class="sm:flex gap-10 items-center md:justify-center">
                <!-- item start -->
                <div class="flex gap-4 items-center md:basis-1/5 md:my-0 my-5">
                    <div class="icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">Mudah Dipahami</h2>
                    </div>
                </div>
                <!-- item end -->
                {{-- <!-- item start -->
                <div class="flex gap-3 items-center md:basis-1/5 md:my-0 my-5">
                    <div class="icon icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">
                            Mudah
                        </h2>
                    </div>
                </div>
                <!-- item end --> --}}
                <!-- item start -->
                <div class="flex gap-3 items-center md:basis-1/5 md:my-0 my-5">
                    <div class="icon icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">
                            Materi Terbaru
                        </h2>
                    </div>
                </div>
                <!-- item end -->
                <!-- item start -->
                <div class="flex gap-3 items-center md:basis-1/5 md:my-0 my-5">
                    <div class="icon icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">Ramah Pengguna</h2>
                    </div>
                </div>
                <!-- item end -->
            </div>
        </div>
    </section>
    <!--  -->

    <!-- Start Categories By Divisi Section -->
    <section id="categories">
        <div class="container mx-auto">
            <h2 class="font-bold text-3xl my-12 text-center">
                Kategori Course
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-2 items-center text-center mx-auto">
                @foreach ($categories as $category)
                    <!-- Start Single Category Item -->
                    <a href="{{ route('category.show', $category->id) }}"
                        class="transition basis-[45%] md:basis-[10.93%] bg-slate-800 cursor-pointer rounded-lg mr-3 p-5 hover:opacity-75 group hover:-translate-y-2 h-full">
                        <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-100">
                            <img src="{{ $category->photo }}" alt="" class="w-16 h-16" />
                        </div>
                        <h4 class="mt-4 mb-2 font-medium text-white">{{ $category->name }}</h4>
                        <p class="text-gray-300 text-xs">{{ count($category->course) }} kursus</p>
                    </a>
                    <!-- End Single Category Item -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Categories By Divisi Section -->

    {{-- <!-- Start Categories Section -->
    <section id="categories">
        <div class="container mx-auto">
            <h2 class="font-bold text-3xl my-12 text-center">
                Kategori Bahasa Pemrograman
            </h2>

            <div
                class="flex flex-row gap-2 items-center text-center flex-wrap pl-4 md:pl-0 justify-center items-center">
                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/bootstrap.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Bootstrap</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FEF9EC] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/html.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">HTML</h4>
                    <p class="text-gray-500 text-xs">30 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/php.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">PHP</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/javascript.webp" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">JavaScript</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/flutter.webp" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Flutter</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FEF9EC] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/cplus.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">C++</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/python.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Python</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/sql.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">SQL</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->
            </div>
        </div>
    </section>
    <!-- End Categories Section --> --}}

    <!-- Start New Courses Section -->
    <section id="courses">
        <div class="container mx-auto">
            <h2 class="font-bold text-3xl text-center my-12">Course Terbaru</h2>
            <div class="swiper swiper-container-2 slide-container w-full">
                <div class="swiper-wrapper">
                    @foreach ($latestCourse as $course)
                    <div class="swiper-slide">
                        <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price"
                            :count="count($course->lessons)" :photo="$course->photo" />
                    </div>
                    @endforeach
                </div>

                <div class="swiper-button-next rounded-full bg-slate-100 nav-btn"></div>
                <div class="swiper-button-prev rounded-full bg-slate-100 nav-btn"></div>


            </div>
        </div>
    </section>
    <!-- End New Courses Section -->

    <!-- Start Popular Courses Section -->
    <section id="courses">
        <div class="container mx-auto">
            <h2 class="font-bold text-3xl text-center my-12">Course Terpopuler</h2>
            <div class="swiper swiper-container-2 slide-container w-full">
                <div class="swiper-wrapper">
                    @foreach ($popularCourse as $course)
                    <div class="swiper-slide">
                        <x-course-card :id="$course->id" :title="$course->title" :category="$course->category_name" :price="$course->price"
                            :count="count($course->lessons)" :photo="$course->photo" />
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next rounded-full bg-slate-100 nav-btn"></div>
                <div class="swiper-button-prev rounded-full bg-slate-100 nav-btn"></div>
            </div>
        </div>
    </section>
    <!-- End Popular Courses Section -->

    <!-- Start FAQ Section -->
    <section id="faq">
        <div class="container mx-auto">
            <div class="flex justify-center items-start">
                <div class="w-full sm:w-10/12 md:w-1/2">
                    <h2 class="text-center font-semibold font-bold py-12 text-3xl">
                        Frequently Asked Question
                    </h2>
                    <ul class="flex flex-col">
                        <li class="bg-white my-2 shadow-md" x-data="accordion(1)">
                            <h2 @click="handleClick()"
                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                <span> Apakah ada biaya untuk mengakses kursus di platform ini?</span>
                                <svg :class="handleRotate()"
                                    class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                    </path>
                                </svg>
                            </h2>
                            <div x-ref="tab" :style="handleToggle()"
                                class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all">
                                <p class="p-3 text-gray-900">
                                    Tergantung pada jenis kursus yang Anda pilih, beberapa kursus mungkin memerlukan
                                    biaya pendaftaran. Namun, kami juga menyediakan sejumlah kursus gratis untuk
                                    memberikan akses pendidikan yang lebih inklusif kepada semua peserta.
                                </p>
                            </div>
                        </li>
                        <li class="bg-white my-2 shadow-md" x-data="accordion(2)">
                            <h2 @click="handleClick()"
                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                <span>Bagaimana cara mendaftar di DNCC Learn?</span>
                                <svg :class="handleRotate()"
                                    class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                    </path>
                                </svg>
                            </h2>
                            <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all"
                                x-ref="tab" :style="handleToggle()">
                                <p class="p-3 text-gray-900">
                                    Untuk mendaftar, klik tombol "Registrasi" yang terdapat di halaman utama. Isi
                                    formulir pendaftaran dengan informasi yang diperlukan dan ikuti instruksi yang
                                    diberikan. Setelah berhasil mendaftar, Anda akan dapat mengakses berbagai kursus
                                    kami.
                                </p>
                            </div>
                        </li>
                        <li class="bg-white my-2 shadow-md" x-data="accordion(3)">
                            <h2 @click="handleClick()"
                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                                <span>
                                    Apakah saya akan mendapatkan sertifikat setelah menyelesaikan kursus?
                                </span>
                                <svg :class="handleRotate()"
                                    class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                    </path>
                                </svg>
                            </h2>
                            <div class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all"
                                x-ref="tab" :style="handleToggle()">
                                <p class="p-3 text-gray-900">
                                    Ya, setelah Anda berhasil menyelesaikan kursus, Anda akan menerima sertifikat
                                    keberhasilan yang dapat diunduh langsung dari akun Anda. Sertifikat ini akan
                                    mencantumkan rincian kursus dan pencapaian Anda sebagai bukti partisipasi.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ Section -->

    <!-- Start Testimoni Section -->
    <section class="bg-slate-100 mt-20">
        <div
            class="mx-auto max-w-[1340px] px-4 py-16 sm:px-6 sm:py-24 lg:me-0 lg:pe-0 lg:ps-8"
        >
            <div
            class="grid grid-cols-1 gap-y-8 lg:grid-cols-3 lg:items-center lg:gap-x-16"
            >
            <div class="max-w-xl text-center mx-auto">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">
                Testimoni
                <br class="hidden sm:block lg:hidden" />
                Pengguna
                </h2>

                <p class="mt-4 text-gray-500">
                Berikut adalah testimoni pengguna DNCC Learn yang telah menyelesaikan course.
                </p>

                <div class="hidden lg:mt-8 lg:flex lg:gap-4">
                <button
                    class="prev-button rounded-full border border-slate-600 p-3 text-slate-500 hover:bg-slate-600 hover:text-white"
                >
                    <span class="sr-only">Previous Slide</span>
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-5 w-5 rtl:rotate-180"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 19.5L8.25 12l7.5-7.5"
                    />
                    </svg>
                </button>

                <button
                    class="next-button rounded-full border border-slate-600 p-3 text-slate-500 hover:bg-slate-600 hover:text-white"
                >
                    <span class="sr-only">Next Slide</span>
                    <svg
                    class="h-5 w-5 rtl:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                        d="M9 5l7 7-7 7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                    />
                    </svg>
                </button>
                </div>
            </div>

            <div class="-mx-6 lg:col-span-2 lg:mx-0">
                <div class="swiper-container !overflow-hidden">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <blockquote
                        class="flex flex-col justify-between bg-white p-12 h-96"
                    >
                        <div>
                        <div class="flex gap-0.5 text-green-500">
                            <!-- star -->
                            <svg
                            class="h-5 w-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                            </svg>
                        </div>

                        <div class="mt-4">
                            <p class="text-2xl font-bold text-slate-800 sm:text-3xl">
                            Farhan
                            </p>

                            <p class="mt-4 leading-relaxed text-gray-500">
                            “Mengandalkan kuliah saja, tidak cukup. Dengan DNCC Learn, saya mantap tinggalkan dunia gaming lantas belajar dunia Android yang ternyata menyenangkan. Yang nomor satu, DNCC Learn mengajarkan ilmu berorientasi kerja. Kini saya sangat terbantu dalam karir saya.”
                            </p>
                        </div>
                        </div>

                    </blockquote>
                    </div>

                <div class="swiper-slide">
                    <blockquote
                        class="flex flex-col justify-between bg-white p-12 h-96"
                    >
                        <div>
                        <div class="flex gap-0.5 text-green-500">
                            <!-- star -->
                            <svg
                            class="h-5 w-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                            </svg>
                        </div>

                        <div class="mt-4">
                            <p class="text-2xl font-bold text-slate-800 sm:text-3xl">
                            Sigit
                            </p>

                            <p class="mt-4 leading-relaxed text-gray-500">
                            “Saya khusus mendedikasikan waktu saya untuk belajar ngoding. Di DNCC Learn belajarnya step by step, library-nya up-to-date. Kalau ada eror, nggak bingung. Di sini saya juga belajar untuk nggak asal coding. CV pun jadi bagus. Saya jadi percaya diri.”
                            </p>
                        </div>
                        </div>
                    </blockquote>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="mt-8 flex justify-center gap-4 lg:hidden">
            <button
                aria-label="Previous slide"
                class="prev-button rounded-full border border-slate-600 p-4 text-slate-500 hover:bg-slate-600 hover:text-white"
            >
                <svg
                class="h-5 w-5 -rotate-180 transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M9 5l7 7-7 7"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                />
                </svg>
            </button>

            <button
                aria-label="Next slide"
                class="next-button rounded-full border border-slate-600 p-4 text-slate-500 hover:bg-slate-600 hover:text-white"
            >
                <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M9 5l7 7-7 7"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                />
                </svg>
            </button>
            </div>
        </div>
    </section>
    <!-- End Testimoni Section -->

    <!-- Start Mentor Section -->
    <section id="mentor" class="bg-cover bg-no-repeat"
        style="
        background-image: url('landingpage/images/heroimage.jpeg');
        background-position: center;" >
            <div class="py-20 md:py-36 bg-black/50 md:px-40 px-10 ">
                <h2 class="font-bold md:text-4xl text-3xl text-center text-white">JADILAH MENTOR UNTUK MENGAJAR DI DNCC LEARN</h2>

                <p class="text-center text-white pt-5 max-w-4xl mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt nisi corrupti fugiat corporis eaque inventore laudantium deleniti nulla quae consectetur, a recusandae earum quidem numquam aut quia, fugit, incidunt voluptatem? Vitae accusantium fugit molestiae eaque. Quis dignissimos mollitia est quia?
                </p>

            <div class="text-center mt-8">
                <a href="{{ route('login') }}"
                    class="w-full px-6 py-3 rounded-full ml-2 text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800">
                    Mulai Mengajar
                </a>
            </div>

        </div>
        <!-- <div class="h-96"></div> -->

    </section>
    <!-- End Mentor Section -->

    <!-- Start Footer Section -->
    <footer class="bg-white">
    <div
        class="mx-auto container space-y-8 py-16 lg:space-y-16"
    >
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 ">
            <div>
                <div class="h-8">
                <img src="landingpage/images/logo-dncc.webp" class="w-25 h-10" alt="" />
                </div>

                <p class="mt-4 max-w-xs text-slate-500 text-sm pt-3">
                <b>Basecamp DNCC</b>
                <br>
                Jl. Nakula 1 No.5-11, Pendrikan Kidul,
                Kec. Semarang Tengah, Kota Semarang,
                Jawa Tengah 50131
                </p>

                <ul class="mt-8 flex gap-6">

                <li>
                    <a
                    href="https://www.instagram.com/dnccsemarang/?hl=id"
                    rel="noreferrer"
                    target="_blank"
                    class="text-gray-700 transition hover:opacity-75"
                    >
                    <span class="sr-only">Instagram</span>

                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </a>
                </li>

                <li>
                    <a
                    href="https://www.youtube.com/channel/UCbGj3OU4Qq8KOgaY9zuyZsA"
                    rel="noreferrer"
                    target="_blank"
                    class="text-gray-700 transition hover:opacity-75"
                    >
                    <span class="sr-only">YouTube</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 576 512">
                            <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                        </svg>
                    </a>
                </li>

                <li>
                    <a
                    href="https://github.com/dnccsemarang"
                    rel="noreferrer"
                    target="_blank"
                    class="text-gray-700 transition hover:opacity-75"
                    >
                    <span class="sr-only">GitHub</span>

                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </a>
                </li>
                </ul>
            </div>

            <div
                class="grid grid-cols-2 gap-8 lg:col-span-2 md:grid-cols-3"
            >
                <!-- tentang kami -->
                <div>
                    <p class="font-medium text-gray-900">Tentang Kami</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                        <a href="#" class="text-gray-700 transition hover:opacity-75">
                            Mulai Belajar
                        </a>
                        </li>

                        <li>
                        <a href="#" class="text-gray-700 transition hover:opacity-75">
                        Lihat Semua Kursus
                        </a>
                        </li>

                        <li>
                        <a href="#" class="text-gray-700 transition hover:opacity-75">
                        Kontak Kami
                        </a>
                        </li>

                        <li>
                        <a href="https://dnccudinus.org/" class="text-gray-700 transition hover:opacity-75">
                        Website Resmi DNCC
                        </a>
                        </li>

                        <li>
                        <a href="https://dinus.ac.id/" class="text-gray-700 transition hover:opacity-75">
                        Website Resmi Universitas
                        </a>
                        </li>
                    </ul>
                </div>

                <!-- kategori -->
                <div>
                <p class="font-medium text-gray-900">Kategori</p>

                <ul class="mt-6 space-y-4 text-sm">
                    <li>
                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                    Web Development
                    </a>
                    </li>

                    <li>
                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                    Mobile Development
                    </a>
                    </li>

                    <li>
                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                    Game Development
                    </a>
                    </li>
                    <li>
                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                    Jaringan Komputer
                    </a>
                    </li>
                    <li>
                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                    Data Analis
                    </a>
                    </li>
                    <li>
                    <a href="#" class="text-gray-700 transition hover:opacity-75">
                    Multimedia
                    </a>
                    </li>
                </ul>
                </div>

                <!-- developer -->
                <div>
                    <p class="font-medium text-gray-900">Tentang Developer</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                        <a href="https://github.com/ryokf" class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
                        <svg
                            class="h-5 w-5 mr-3"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd"
                            />
                        </svg>
                        Ryo Khrisna Fitriawan
                        </a>
                        </li>
                        <li>
                        <a href="https://github.com/rmarioapn3" class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
                        <svg
                            class="h-5 w-5 mr-3"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd"
                            />
                        </svg>
                        Mario Aprilnino Prasetyo
                        </a>
                        </li>
                        <li>
                        <a href="https://github.com/taliyameyswara" class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
                        <svg
                            class="h-5 w-5 mr-3"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd"
                            />
                        </svg>
                        Taliya Meyswara
                        </a>
                        </li>
                        <li>
                        <a href="https://github.com/isnanramalia" class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
                        <svg
                            class="h-5 w-5 mr-3"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd"
                            />
                        </svg>
                        Isna Nur Amalia
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-xs text-gray-500 text-center">
        &copy; 2023. DNCC. All rights reserved.
        </p>
    </div>
    </footer>
    <!-- End Footer Section -->

    {{-- start modal logout --}}
    <div id="popup-modal-logout" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal-logout">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center ">

                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">anda yakin ingin melakukan
                        logout?</h3>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        {{-- <button type="submit"
                            class="text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            iyah
                        </button> --}}
                        <button type="submit"
                            class="text-gray-500 bg-red-600 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            gak bisa ganti warna background, tolong:)</button>
                        <button data-modal-hide="popup-modal-logout" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            batal</button>
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
                loop: true,
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
