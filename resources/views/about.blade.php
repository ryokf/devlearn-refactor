@extends('layout.main')
@section('content')
    <section class="header relative pt-16 items-center flex h-screen max-h-860-px">
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
    <section class="mt-0 md:mt-0 pb-40 relative bg-blueGray-600 text-white">
        <div class="justify-center text-center flex flex-wrap mt-0 ">
            <div class="w-full md:w-6/12 px-12 md:px-4 pt-6">
                <h2 class="font-semibold text-4xl">Our Team</h2>
            </div>
        </div>
    </section>
    <section class="block relative z-1 bg-blueGray-600 text-blueGray-300 pt-0">
        <div class="container mx-auto">
            <div class="justify-center flex flex-wrap">
                <div class="lg:w-8/12 px-4 -mt-24">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-1/2 lg:w-6/12 px-4">
                            <a href="">
                                <div
                                    class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                    <div class="card-head">
                                        <img alt="..." class="align-middle border-none max-w-full h-auto rounded-lg"
                                            src="/assets/img/profile.jpg" />
                                    </div>
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Ryo Khrisna F' }}
                                        </h5>
                                        <h5 class="text-lg font-semibold pb-4 text-left text-blueGray-300">
                                            {{ 'Fullstack Developer' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-black">
                                            {{ 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id blanditiis dolorem earum. Officia quasi voluptas quas, ut tempora at perspiciatis aspernatur, error quaerat maiores veritatis quibusdam animi. Eos voluptas rerum magnam odio aut accusantium quas corrupti quibusdam dicta laboriosam adipisci earum ut eligendi ab dolorem reprehenderit, error natus. Laborum, deserunt?' }}
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
                                    <div class="card-head">
                                        <img alt="..." class="align-middle border-none max-w-full h-auto rounded-lg"
                                            src="/assets/img/profile.jpg" />
                                    </div>
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Ryo Khrisna F' }}
                                        </h5>
                                        <h5 class="text-lg font-semibold pb-4 text-left text-blueGray-300">
                                            {{ 'Fullstack Developer' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-black">
                                            {{ 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id blanditiis dolorem earum. Officia quasi voluptas quas, ut tempora at perspiciatis aspernatur, error quaerat maiores veritatis quibusdam animi. Eos voluptas rerum magnam odio aut accusantium quas corrupti quibusdam dicta laboriosam adipisci earum ut eligendi ab dolorem reprehenderit, error natus. Laborum, deserunt?' }}
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
                                    <div class="card-head">
                                        <img alt="..." class="align-middle border-none max-w-full h-auto rounded-lg"
                                            src="/assets/img/profile.jpg" />
                                    </div>
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Ryo Khrisna F' }}
                                        </h5>
                                        <h5 class="text-lg font-semibold pb-4 text-left text-blueGray-300">
                                            {{ 'Fullstack Developer' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-black">
                                            {{ 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id blanditiis dolorem earum. Officia quasi voluptas quas, ut tempora at perspiciatis aspernatur, error quaerat maiores veritatis quibusdam animi. Eos voluptas rerum magnam odio aut accusantium quas corrupti quibusdam dicta laboriosam adipisci earum ut eligendi ab dolorem reprehenderit, error natus. Laborum, deserunt?' }}
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
                                    <div class="card-head">
                                        <img alt="..." class="align-middle border-none max-w-full h-auto rounded-lg"
                                            src="/assets/img/profile.jpg" />
                                    </div>
                                    <div class="card-body px-3">
                                        <h5 class="text-xl font-semibold mt-5 pb-2 text-left text-blueGray-800">
                                            {{ 'Ryo Khrisna F' }}
                                        </h5>
                                        <h5 class="text-lg font-semibold pb-4 text-left text-blueGray-300">
                                            {{ 'Fullstack Developer' }}
                                        </h5>
                                        <h5 class="text-base font-semibold pb-4 text-left text-black">
                                            {{ 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id blanditiis dolorem earum. Officia quasi voluptas quas, ut tempora at perspiciatis aspernatur, error quaerat maiores veritatis quibusdam animi. Eos voluptas rerum magnam odio aut accusantium quas corrupti quibusdam dicta laboriosam adipisci earum ut eligendi ab dolorem reprehenderit, error natus. Laborum, deserunt?' }}
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
