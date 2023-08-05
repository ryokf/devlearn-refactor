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

    <!-- Style -->
    <link rel="stylesheet" href="./landingpage/css/style.css" />


    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500&display=swap" rel="stylesheet" />
</head>

<body class="font-poppins text-gray-800 overflow-x-hidden" id="top">
    <!-- Start Navbar -->
    <nav class="bg-white shadow p-4 sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <div class="flex justify-center items-center text-slate-800">
                    <div class="min-w-max inline-flex relative">
                        <a href="index.html">
                            <img src="landingpage/images/logo.webp" class="w-full h-7" alt="" />
                        </a>
                    </div>
                    <!-- kategori -->
                    <div class="hidden md:block ml-10 group relative">
                        <a href="#">Kategori</a>
                        <div
                            class="hidden border-gray-100 absolute group-hover:block min-w-[200px] pt-8 drop-shadow-md">
                            <ul class="list-none">
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Web Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Mobile Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Game Development
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Data Analyst
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Jaringan
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Multimedia
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- langganan -->
                    <div class="hidden md:block ml-10 group relative">
                        <a href="#">Langganan</a>
                    </div>
                </div>

                <!-- searchbar -->
                <div class="hidden lg:block w-[30%] relative">
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

                <!-- cart, login, sign in -->
                <div class="flex justify-center pr-5 md:pr-0">
                    <!-- cart -->
                    <div class="relative">
                        <ul class="list-none">
                            <li class="inline-block mx-3 sm:mx-4 md:mx-6 relative group mt-3">
                                <a href="#" class="text-xl text-gray-500 group-hover:opacity-75">
                                    <span
                                        class="absolute -top-2 bg-red-500 -right-3.5 text-white pl-2 text-sm rounded-full h-5 w-5">
                                        1
                                    </span>
                                    <span class="text-slate-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                    </span>
                                </a>
                                <!-- content -->
                                <div class="hidden group-hover:block absolute shadow w-80 p-4 bg-white ml-4 right-1">
                                    <div class="flex p-2 border-b border-slate-200">
                                        <!-- tampilan keranjang kosong -->
                                        <div>
                                            <h3 class="text-gray-500 font-normal">
                                                Keranjang Anda Kosong
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- tampilan keranjang terisi -->
                                    <div class="flex p-2 border-slate-200 items-center">
                                        <!-- <div class="flex"> -->
                                        <div class="mr-2">
                                            <img src="landingpage/images/avatar1.png" alt=""
                                                class="object-cover w-12 h-12" />
                                        </div>
                                        <a href="#" class="details">
                                            <h3 class="text-slate-800 font-bold text-lg">
                                                Nama Course
                                            </h3>
                                            <p class="text-gray-400 text-sm">Nama Author</p>
                                            <p class="text-slate-800 text-lg font-bold">
                                                Rp300.000
                                            </p>
                                        </a>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- masuk -->
                    @if (Auth::user())
                        <div class="hidden md:block relative">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button
                                    class="inline-flex items-center w-full px-6 py-2 rounded-full ml-2 text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800"
                                    type="submit">Logout</button>
                            </form>

                        </div>
                    @else
                        <div class="hidden md:block relative">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center w-full px-6 py-2 rounded-full ml-2 text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800">
                                Masuk
                            </a>
                        </div>


                        <!-- daftar -->
                        <div class="hidden md:block relative">
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center w-full px-6 py-2 rounded-full ml-2 text-base font-semibold text-white align-middle bg-slate-800 border select-none sm:mb-0 sm:w-auto hover:opacity-95">
                                Daftar
                            </a>
                        </div>
                    @endif

                </div>
            </div>

            <!-- nav toggle mobile -->
            <div class="absolute top-1 right-4 cursor-pointer mt-5">
                <span class="md:hidden navbar-toggle text-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </span>
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
                            <h1 class="cursor-pointer py-1 rounded-md mt-1">
                                Front-End Programming
                            </h1>
                            <h1 class="cursor-pointer py-1 rounded-md mt-1">
                                Back-End Programming
                            </h1>
                            <h1 class="cursor-pointer py-1 rounded-md mt-1">Design</h1>
                        </div>
                    </li>
                    <li class="py-3">
                        <div class="flex justify-between w-full items-center">
                            <span class="text-[15px] ml-2 text-slate-800 font-semibold">Langganan</span>
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

                <div class="flex gap-3 mt-5">
                    <!-- masuk -->
                    <div class="relative">
                        <a href="#_"
                            class="inline-flex items-center w-full px-6 py-2 rounded-full text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800">
                            Masuk
                        </a>
                    </div>
                    <!-- daftar -->
                    <div class="relative">
                        <a href="#_"
                            class="inline-flex items-center w-full px-6 py-2 rounded-full text-base font-semibold text-white align-middle bg-slate-800 border select-none sm:mb-0 sm:w-auto hover:opacity-95 text-center">
                            Daftar
                        </a>
                    </div>
                </div>
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
                eaque, amet error magnam laudantium aperiam perferendis maxime
                corporis, omnis, optio officia id. Veritatis at cum velit delectus id
                voluptas earum?
            </p>
            <!-- button mulai belajar -->
            <a href="#_"
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

    <section class="w-full py-10 bg-slate-50 px-10">
        <div class="container mx-auto">
            <div class="flex flex-row gap-10 items-center flex-wrap md:justify-center">
                <!-- item start -->
                <div class="flex gap-4 items-center md:basis-1/5">
                    <div class="icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">Cepat & Mudah</h2>
                    </div>
                </div>
                <!-- item end -->
                <!-- item start -->
                <div class="flex gap-3 items-center md:basis-1/5">
                    <div class="icon icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">
                            Simple & Tinggal Belajar
                        </h2>
                    </div>
                </div>
                <!-- item end -->
                <!-- item start -->
                <div class="flex gap-3 items-center md:basis-1/5">
                    <div class="icon icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">
                            Materi Up-To-Date
                        </h2>
                    </div>
                </div>
                <!-- item end -->
                <!-- item start -->
                <div class="flex gap-3 items-center md:basis-1/5">
                    <div class="icon icon bg-slate-200 p-3 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>
                    </div>
                    <div class="text">
                        <h2 class="font-semibold text-xl pb-3 md:pb-0">User Friendly</h2>
                    </div>
                </div>
                <!-- item end -->
            </div>
        </div>
    </section>

    <!-- Start Categories By Divisi Section -->
    <section id="categories" class="mt-12">
        <div class="container mx-auto">
            <h2 class="font-bold text-2xl my-12 text-center">
                Kategori Divisi
            </h2>

            <div
                class="flex flex-row gap-2 items-center text-center flex-wrap pl-4 md:pl-0 justify-center items-center">
                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/web.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Web Development</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FEF9EC] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/mobile.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Mobile Development</h4>
                    <p class="text-gray-500 text-xs">30 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/game.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Game Development</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/dataAnalis.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Data Analyst</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/jaringan.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Jaringan</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FEF9EC] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="landingpage/images/icons/multimedia.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Multimedia</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->
            </div>
        </div>
    </section>
    <!-- End Categories By Divisi Section -->

    <!-- Start Categories Section -->
    <section id="categories" class="mt-12">
        <div class="container mx-auto">
            <h2 class="font-bold text-2xl my-12 text-center">
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
    <!-- End Categories Section -->

    <!-- Start New Courses Section -->
    <section id="courses" class="pt-20">
        <div class="container mx-auto">
            <h2 class="font-bold my-12 text-2xl text-center">Course Terbaru</h2>

            <div id="popular-course">
                <!-- Single New Item -->
                <div class="course-item group">
                    <a href="#">
                        <div
                            class="border border-gray-100 shadow-sm rounded shadow-md mr-3 transition group-hover:shadow-lg">
                            <img src="landingpage/images/course1.png" alt=""
                                class="w-full rounded rounded-b-none" />
                            <div class="mt-3 p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="text-green-600 font-bold"> Rp. 0 </span>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4 text-xs">
                                    <h2 class="text-base mt-3 font-medium hover:text-blue-700">
                                        Nama Course
                                    </h2>
                                    <p class="text-gray-400 mt-2">32 Lesson</p>
                                    <div class="flex mt-5 items-center">
                                        <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                            Kategori
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Single New Item -->
                <div class="course-item group">
                    <a href="#">
                        <div
                            class="border border-gray-100 shadow-sm rounded shadow-md mr-3 transition group-hover:shadow-lg">
                            <img src="landingpage/images/course1.png" alt=""
                                class="w-full rounded rounded-b-none" />
                            <div class="mt-3 p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="text-green-600 font-bold"> Rp. 0 </span>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4 text-xs">
                                    <h2 class="text-base mt-3 font-medium hover:text-blue-700">
                                        Nama Course
                                    </h2>
                                    <p class="text-gray-400 mt-2">32 Lesson</p>
                                    <div class="flex mt-5 items-center">
                                        <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                            Kategori
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Single New Item -->
                <div class="course-item group">
                    <a href="#">
                        <div
                            class="border border-gray-100 shadow-sm rounded shadow-md mr-3 transition group-hover:shadow-lg">
                            <img src="landingpage/images/course1.png" alt=""
                                class="w-full rounded rounded-b-none" />
                            <div class="mt-3 p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="text-green-600 font-bold"> Rp. 0 </span>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4 text-xs">
                                    <h2 class="text-base mt-3 font-medium hover:text-blue-700">
                                        Nama Course
                                    </h2>
                                    <p class="text-gray-400 mt-2">32 Lesson</p>
                                    <div class="flex mt-5 items-center">
                                        <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                            Kategori
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Single New Item -->
                <div class="course-item group">
                    <a href="#">
                        <div
                            class="border border-gray-100 shadow-sm rounded shadow-md mr-3 transition group-hover:shadow-lg">
                            <img src="landingpage/images/course1.png" alt=""
                                class="w-full rounded rounded-b-none" />
                            <div class="mt-3 p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="text-green-600 font-bold"> Rp. 0 </span>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4 text-xs">
                                    <h2 class="text-base mt-3 font-medium hover:text-blue-700">
                                        Nama Course
                                    </h2>
                                    <p class="text-gray-400 mt-2">32 Lesson</p>
                                    <div class="flex mt-5 items-center">
                                        <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                            Kategori
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Single New Item -->
                <div class="course-item group">
                    <a href="#">
                        <div
                            class="border border-gray-100 shadow-sm rounded shadow-md mr-3 transition group-hover:shadow-lg">
                            <img src="landingpage/images/course1.png" alt=""
                                class="w-full rounded rounded-b-none" />
                            <div class="mt-3 p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="text-green-600 font-bold"> Rp. 0 </span>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4 text-xs">
                                    <h2 class="text-base mt-3 font-medium hover:text-blue-700">
                                        Nama Course
                                    </h2>
                                    <p class="text-gray-400 mt-2">32 Lesson</p>
                                    <div class="flex mt-5 items-center">
                                        <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                            Kategori
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End New Courses Section -->

    <!-- Start Footer Section -->
    <footer class="bg-[#00103F] text-white mt-20">
        <div class="container mx-auto px-5 py-16">
            <div class="flex flex-col md:flex-row">
                <div class="basis-1/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">Tentang Kami</h3>
                        <div class="text-sm">
                            <ul class="list-none mt-4">
                                <li class="mb-1 hover:opacity-75">
                                    <a href="#" class="text-sm"> Mulai Belajar </a>
                                </li>
                                <li class="mb-1 hover:opacity-75">
                                    <a href="#" class="text-sm"> Lihat Semua Kursus </a>
                                </li>
                                <li class="mb-1 hover:opacity-75">
                                    <a href="#" class="text-sm"> Kontak Kami </a>
                                </li>
                                <li class="mb-1 hover:opacity-75">
                                    <a href="https://dnccudinus.org/" class="text-sm">
                                        Website Resmi DNCC
                                    </a>
                                </li>
                                <li class="mb-1 hover:opacity-75">
                                    <a href="https://dinus.ac.id/" class="text-sm">
                                        Website Resmi Universitas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="basis-1/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">Masuk - Sign In</h3>
                        <ul class="list-none mt-4">
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Untuk Mahasiswa </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Untuk Pembelajar </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="basis-1/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">Kategori</h3>
                        <ul class="list-none mt-4">
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Web Development </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Mobile Development </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Game Development </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Jaringan Komputer </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Data Analis </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="#" class="text-sm"> Multimedia </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="basis-1/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">Tentang Developer</h3>
                        <ul class="list-none mt-4">
                            <li class="mb-1 hover:opacity-75">
                                <a href="https://github.com/ryokf" class="flex items-center text-sm hover:opacity-75">
                                    <img src="landingpage/images/icons/github.svg" alt="GitHub"
                                        class="h-5 w-5 mr-2" />
                                    Ryo Khrisna Fitriawan
                                </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="https://github.com/marioapn3"
                                    class="flex items-center text-sm hover:opacity-75">
                                    <img src="landingpage/images/icons/github.svg" alt="GitHub"
                                        class="h-5 w-5 mr-2" />
                                    Mario Aprilnino Prasetya
                                </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="https://github.com/taliyameyswara"
                                    class="flex items-center text-sm hover:opacity-75">
                                    <img src="landingpage/images/icons/github.svg" alt="GitHub"
                                        class="h-5 w-5 mr-2" />
                                    Taliya Meyswara
                                </a>
                            </li>
                            <li class="mb-1 hover:opacity-75">
                                <a href="https://github.com/isnanramalia"
                                    class="flex items-center text-sm hover:opacity-75 hover:opacity-75">
                                    <img src="landingpage/images/icons/github.svg" alt="GitHub"
                                        class="h-5 w-5 mr-2" />
                                    Isna Nur Amalia
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="basis-2/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">
                            Tentang DNCC Learning Platform
                        </h3>
                        <p class="mt-4 relative">
                            Kami menyediakan pendidikan berkualitas dengan kursus-kursus
                            komprehensif untuk semua. Misi kami adalah menyediakan
                            kursus-kursus yang mudah diakses dan komprehensif untuk berbagai
                            minat dan tingkat kemampuan. Bergabunglah dengan kami dalam
                            perjalanan transformasi ilmu pengetahuan dan wujudkan potensi
                            Anda sepenuhnya hari ini!
                        </p>
                    </div>
                </div>
            </div>
            <hr class="mb-4 mt-8" />
            <div class="text-center mt-4">
                &copy; 2023 DNCC. All rights reserved.
            </div>

            <!-- scroll to top -->
            <div>
                <a id="scroll-to-top" href="#top"
                    class="transition hidden shadow bottom-1 right-1 w-14 h-14 rounded-[50%] bg-sky-600 hover:opacity-80 z-50 border group">
                    <div class="transition pt-4 pl-4 text-white group-hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- Scripts -->
    <!-- Jquery JS -->
    <script src="{{ asset('landingpage/vendors/jquery/jquery-3.6.0.min.js') }}"></script>

    <!-- Slick Carousel JS -->
    <script src="{{ asset('landingpage/vendors/slick/slick.min.js') }}"></script>

    <!-- Main JS -->
    <<<<<<< HEAD <script src="{{ asset('js/main.js') }}"></script>
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
</body>
=======
<script src="{{ asset('landingpage/js/main.js') }}"></script>
</body>
<script>
    function dropDown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
    }
    dropDown(); >>>
    >>> > fa7a4328ff472a27247592c78501d76898a51631


        <
        /html>
