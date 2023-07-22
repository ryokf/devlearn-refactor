@extends('layouts.main')
@section('content')
    <section class="header relative pt-16 items-center flex h-screen max-h-860-px">
        <div class="container mx-auto items-center flex ">
            <div class="w-full px-4">
                <div class="pt-32 sm:pt-0">
                    <h2 class="font-semibold text-4xl text-blueGray-600">
                        Mewujudkan Potensi Anda Melalui Kursus-kursus Berkualitas
                    </h2>
                    <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                        Website ini menawarkan berbagai kursus berkualitas dalam beragam bidang, dirancang untuk
                        meningkatkan pengetahuan dan keterampilan Anda. Dengan pilihan kursus yang beragam, kami menyediakan
                        solusi pembelajaran yang tepat sesuai kebutuhan Anda.
                    </p>
                    @auth
                    @else
                        <div class="mt-12 text-center">
                            <a href="{{ route('login') }}"
                                class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-teal-500 active:bg-teal-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                                Get started
                            </a>
                        </div>
                    @endauth

                </div>

            </div>
            <img class="hidden lg:block b-auto pt-16 sm:w-6/12 -mt-0 sm:mt-10 w-10/12 max-h-860-px"
                src="./assets/img/hero.png" alt="..." />
        </div>

    </section>

    <section class="mt-0 md:mt-0  relative bg-blueGray-600">
        <div class="justify-center text-center flex flex-wrap mt-0 ">
            <div class="w-full md:w-6/12 px-12 md:px-4 pt-6">
                <h2 class="font-semibold text-4xl">Kelas Online Devlearn</h2>
                <p class="text-lg leading-relaxed mt-4 mb-4 text-blueGray-300">
                    Menawarkan berbgai macam kursus dengan materi pilihan yang tentunya terupdate
                </p>
            </div>
        </div>
    </section>

    <section class="header relative pb-20 items-center flex max-h-860-px">
        <div class="container mx-auto items-center flex ">
            <img class="hidden lg:block b-auto pt-16 sm:w-6/12 -mt-0 sm:mt-10 w-10/12 max-h-860-px"
                src="./assets/img/hero.png" alt="..." />
            <div class="w-full px-4">
                <div class="pt-32 sm:pt-0">
                    <h2 class="font-semibold text-4xl text-blueGray-600">
                        Selamat datang di Website DEV<span class="text-teal-500">LEARN</span>!
                    </h2>
                    <p class="mt-4 text-lg leading-relaxed text-blueGray-500">


                        Kami adalah sebuah komunitas pembelajaran daring yang berdedikasi untuk memberikan akses ke
                        pengetahuan dan keterampilan berkualitas kepada semua orang, di mana pun mereka berada. Dengan
                        menggabungkan teknologi terkini dengan materi pembelajaran yang terpercaya, kami berusaha untuk
                        membantu Anda mencapai potensi penuh dalam pendidikan dan perkembangan pribadi.

                        Misi kami adalah menciptakan lingkungan pembelajaran yang menyenangkan, interaktif, dan mendidik
                        bagi semua peserta. Kami menyediakan beragam kursus, modul, dan konten belajar dari berbagai bidang,
                        mulai dari ilmu pengetahuan, teknologi, bahasa, seni, hingga bisnis dan kewirausahaan. Baik Anda
                        seorang pelajar, profesional, atau bahkan orang tua yang ingin mendukung pendidikan anak-anak,
                        platform eLearning kami siap untuk memenuhi kebutuhan Anda.
                    </p>

                </div>
            </div>

        </div>
    </section>

    <section class="pb-16 bg-blueGray-200 relative pt-32">
        {{-- <div class="-mt-20 top-0 bottom-auto left-0 right-0 w-full absolute h-20" style="transform: translateZ(0)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div> --}}

        {{-- <div class="container mx-auto">
            <div class="flex flex-wrap justify-center bg-white shadow-xl rounded-lg -mt-64 py-16 px-12 relative z-10">
                <div class="w-full text-center lg:w-8/12">
                    <p class="text-4xl text-center">
                        <span role="img" aria-label="love"> 😍 </span>
                    </p>
                    <h3 class="font-semibold text-3xl">
                        Do you love this Starter Kit?
                    </h3>
                    <p class="text-blueGray-500 text-lg leading-relaxed mt-4 mb-4">
                        Cause if you do, it can be yours now. Hit the buttons below to
                        navigate to get the Free version for your next project. Build a
                        new web app or give an old project a new look!
                    </p>
                    <div class="sm:block flex flex-col mt-10">
                        <a href="https://www.creative-tim.com/learning-lab/tailwind/js/overview/notus?ref=njs-index"
                            target="_blank"
                            class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-2 bg-pink-500 active:bg-pink-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            Get started
                        </a>
                        <a href="https://github.com/creativetimofficial/notus-js?ref=njs-index" target="_blank"
                            class="github-star sm:ml-1 text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            <i class="fab fa-github text-lg mr-1"></i>
                            <span>Help With a Star</span>
                        </a>
                    </div>
                    <div class="text-center mt-16"></div>
                </div>
            </div>
        </div> --}}
    </section>

    {{-- kategori --}}

    <section class="block relative z-1 bg-blueGray-600 text-blueGray-300">
        <div class="container mx-auto">
            <div class="justify-center flex flex-wrap">
                <div class="w-full lg:w-12/12 px-4 -mt-24">
                    <div class="flex flex-wrap">
                        @foreach ($categories as $category)
                            <div class="w-full lg:w-4/12 px-4">
                                <h5 class="text-xl font-semibold pb-4 text-center">
                                    {{ $category->name }}
                                </h5>
                                <a href="/category/{{ $category->id }}">
                                    <div
                                        class="w-full h-80 overflow-hidden hover:-mt-4 relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg ease-linear transition-all duration-150">
                                        <img alt="..."
                                            class="w-full h-80 align-middle border-none max-w-full h-auto rounded-lg"
                                            src="{{ asset('storage/' . $category->photo) }}" />
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- akhir kategori --}}

    <section class="header relative pt-16 z-1 items-center block   ">
        <div class="container mx-auto pt-16">
            <h5 class="text-xl font-semibold  text-center">
                {{ 'Pertanyaan yang mungkin anda butuhkan' }}
            </h5>
            <div class="justify-center flex flex-wrap pt-16">
                <div class="lg:w-12/12  px-4 -mt-24  pt-16">
                    <div class="flex flex-wrap justify-center  pt-16">
                        <div class="w-1/2 lg:w-6/12 sm:w-3/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-red-400">
                                            {{ 'Apa itu eLearning?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'eLearning atau pembelajaran daring adalah metode pembelajaran yang menggunakan teknologi internet untuk menyajikan materi pembelajaran. Di platform kami, Anda dapat mengakses beragam kursus dan modul pembelajaran dari berbagai bidang melalui perangkat komputer atau perangkat seluler Anda.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="w-1/2 lg:w-6/12 sm:w-3/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-red-800">
                                            {{ 'Bagaimana cara mendaftar di platform eLearning ini?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'Untuk mendaftar, klik tombol "Registrasi" yang terdapat di halaman utama. Isi formulir pendaftaran dengan informasi yang diperlukan dan ikuti instruksi yang diberikan. Setelah berhasil mendaftar, Anda akan dapat mengakses berbagai kursus kami.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="w-1/2 lg:w-6/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Apakah ada biaya untuk mengakses kursus di platform ini?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'Tergantung pada jenis kursus yang Anda pilih, beberapa kursus mungkin memerlukan biaya pendaftaran. Namun, kami juga menyediakan sejumlah kursus gratis untuk memberikan akses pendidikan yang lebih inklusif kepada semua peserta.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="w-1/2 lg:w-6/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Apakah saya akan mendapatkan sertifikat setelah menyelesaikan kursus?' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-blueGray-500">
                                            {{ 'Ya, setelah Anda berhasil menyelesaikan kursus, Anda akan menerima sertifikat keberhasilan yang dapat diunduh langsung dari akun Anda. Sertifikat ini akan mencantumkan rincian kursus dan pencapaian Anda sebagai bukti partisipasi.' }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-16 bg-blueGray-200 relative pt-32">
    </section>



    <section class="pb-16 bg-blueGray-200 relative pt-32">
        {{-- <div class="-mt-20 top-0 bottom-auto left-0 right-0 w-full absolute h-20" style="transform: translateZ(0)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div> --}}

        {{-- <div class="container mx-auto">
            <div class="flex flex-wrap justify-center bg-white shadow-xl rounded-lg -mt-64 py-16 px-12 relative z-10">
                <div class="w-full text-center lg:w-8/12">
                    <p class="text-4xl text-center">
                        <span role="img" aria-label="love"> 😍 </span>
                    </p>
                    <h3 class="font-semibold text-3xl">
                        Do you love this Starter Kit?
                    </h3>
                    <p class="text-blueGray-500 text-lg leading-relaxed mt-4 mb-4">
                        Cause if you do, it can be yours now. Hit the buttons below to
                        navigate to get the Free version for your next project. Build a
                        new web app or give an old project a new look!
                    </p>
                    <div class="sm:block flex flex-col mt-10">
                        <a href="https://www.creative-tim.com/learning-lab/tailwind/js/overview/notus?ref=njs-index"
                            target="_blank"
                            class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-2 bg-pink-500 active:bg-pink-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            Get started
                        </a>
                        <a href="https://github.com/creativetimofficial/notus-js?ref=njs-index" target="_blank"
                            class="github-star sm:ml-1 text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            <i class="fab fa-github text-lg mr-1"></i>
                            <span>Help With a Star</span>
                        </a>
                    </div>
                    <div class="text-center mt-16"></div>
                </div>
            </div>
        </div> --}}
    </section>
@endsection
