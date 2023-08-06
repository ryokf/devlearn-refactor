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
                        <a href="#mentor">Mentor</a>
                    </div>
                </div>

                <!-- searchbar -->
                <div class="hidden lg:block w-[45%] relative">
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
                                    <div class="cursor-pointer">
                                      {{ Auth::user()->name }}
                                    </div>
                                </div>
                            </div>
                            <!-- open -->
                            <div x-show="open" class="absolute w-50 py-2 bg-white  shadow-md border dark:border-transparent mt-3">
                            <!-- dropdown -->
    
                            <ul class="list-none">
                                <li>
                                    <a href="#"
                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Profil
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
                <div class="flex md:hidden cursor-pointer my-auto">
                    <span class="navbar-toggle text-slate-900 flex-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
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

    <section class="bg-white">
        <main
        class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6 py-20"
        >
        
        <div class="max-w-xl lg:max-w-3xl">
        <div class="relative my-auto block lg:hidden lg:text-center justify-center">
            <h1
                class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl"
            >
            Masuk Akun DNCC Learn
            </h1>
            </div>

            <form method="POST" action="{{ route('login') }}" class="mt-8 grid grid-cols-6 gap-6">
            @csrf

            <div class="col-span-12">
                <label for="Email" class="block text-sm font-medium text-gray-700">
                Email
                </label>

                <input
                type="email"
                id="Email"
                name="email"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                />
            </div>

            <div class="col-span-12">
                <label
                for="Password"
                class="block text-sm font-medium text-gray-700"
                >
                Password
                </label>

                <input
                type="password"
                id="Password"
                name="password"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                />
            </div>

            <div class="col-span-12">
                <button
                class="mx-auto inline-block shrink-0 rounded-md bg-slate-800 hover:bg-slate-700 px-12 py-3 text-sm font-medium text-white w-full"
                >
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



    <!-- Start Footer Section -->
    <footer class="bg-slate-800 text-white">
        <div class="container mx-auto px-5 py-16">
            <div class="flex flex-col md:flex-row">
                <div class="basis-1/3">
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
                {{-- <div class="basis-1/6">
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
                </div> --}}
                <div class="basis-1/3">
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

                <div class="basis-1/3">
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
                                    Mario Aprilnino Prasetyo
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
                {{-- <div class="basis-1/3">
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
                </div> --}}
            </div>
            <hr class="mb-4 mt-8" />
            <div class="text-center mt-4">
                &copy; 2023 DNCC. All rights reserved.
            </div>

            <!-- scroll to top -->
            <div>
                <a id="scroll-to-top" href="#top"
                    class="transition hidden shadow bottom-1 right-1 w-14 h-14 rounded-[50%] bg-slate-800 hover:opacity-80 z-50 border group">
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
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 32,
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
            return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
        })
    </script>
</body>

</html>
