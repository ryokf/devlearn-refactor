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
    <section class="bg-white">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
        <section
        class="relative bg-slate-800 lg:col-span-5 lg:h-full xl:col-span-6 flex items-center"
        >
        <img
            alt="Night"
            src="./landingpage/images/heroimage.jpeg"
            class="absolute h-full w-full object-cover opacity-50"
        />

        <div class="hidden lg:relative lg:block lg:p-20">
            <a class="text-white" href="/">
            <span class="sr-only">Home</span>
            <h2
                class="font-bold text-6xl">
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
        class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6"
        >
        
        <div class="max-w-xl lg:max-w-3xl">
        <div class="relative my-auto block lg:hidden lg:text-center justify-center">
            <h1
                class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl"
            >
            Daftar Akun DNCC Learn
            </h1>
            </div>

            <form action="{{ route('register') }}" class="mt-8 grid grid-cols-6 gap-6">
            @csrf
            <div class="col-span-12 sm:col-span-6">
                <label
                for="FirstName"
                class="block text-sm font-medium text-gray-700"
                >
                Nama Lengkap
                </label>
                <input
                type="text"
                id="name"
                name="name"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                />
                <p class="text-sm text-gray-500 mt-2">
                Masukkan nama lengkap Anda
                </p>
            </div>

            <div class="col-span-12 sm:col-span-6">
                <label for="Email" class="block text-sm font-medium text-gray-700">
                Email
                </label>

                <input
                type="email"
                id="Email"
                name="email"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                />

                <p class="text-sm text-gray-500 mt-2">
                Masukkan nama lengkap Anda
                </p>
            </div>

            <div class="md:col-span-3 col-span-12">
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

            <div class="md:col-span-3 col-span-12">
                <label
                for="PasswordConfirmation"
                class="block text-sm font-medium text-gray-700"
                >
                Konfirmasi Password
                </label>

                <input
                type="password"
                id="PasswordConfirmation"
                name="password_confirmation"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                />
            </div>

            <div class="col-span-12 sm:col-span-6">
                <p class="text-sm text-gray-500">
                Dengan melakukan pendaftaran, Anda setuju dengan 
                <a href="#" class="text-gray-700 underline">
                syarat & ketentuan DNCC Learn.
                </a>
                </p>
            </div>
            

            <div class="col-span-12 sm:col-span-6 ">
                <button
                class="mx-auto inline-block shrink-0 rounded-md bg-slate-800 hover:bg-slate-700 px-12 py-3 text-sm font-medium text-white w-full"
                >
                Daftar
                </button>
                <div class="sm:flex sm:items-center sm:gap-4">
                <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-gray-700 underline">Masuk</a>.
                </div>
                </p>
            </div>
            </form>
        </div>
        </main>
    </div>
    </section>

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

