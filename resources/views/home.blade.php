@extends('layouts.layout')

@section('body')
    <h1>
        ini adalah home, anda login sebagai {{ request()->user()->roles[0]['name'] ?? 'tamu' }}
    </h1>

    {{-- @role('admin')
        Admin
    @endrole --}}

    {{-- @role('member')
        Admin
    @endrole --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>


    <nav class="bg-white shadow p-4 sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <div class="flex justify-center items-center text-slate-800">
                    <div class="min-w-max inline-flex relative">
                        <a href="index.html">
                            <img src="./images/logo.webp" class="w-full h-7" alt="" />
                        </a>
                    </div>
                    <!-- kategori -->
                    <div class="hidden md:block ml-10 group relative">
                        <a href="#">Kategori</a>
                        <div class="hidden border-gray-100 absolute group-hover:block min-w-[200px] pt-8 drop-shadow-md">
                            <ul class="list-none">
                                <li>
                                    <a href="#" class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Front-End Programming
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Back-End Programming
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block bg-white hover:bg-slate-50 py-4 px-8 hover:text-sky-600">
                                        Design
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
                <div class="flex justify-center items-center pr-5 md:pr-0">
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
                                <div class="hidden group-hover:block absolute shadow w-80 p-4 bg-white ml-4 right-1">
                                    <div class="flex p-2 border-b border-slate-200">
                                        <!-- tampilan keranjang kosong -->
                                        <div>
                                            <h3 class="text-gray-500 font-normal">
                                                Keranjang Anda Kosong
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="flex p-2 border-slate-200 items-center">
                                        <div class="flex">
                                            <div class="mr-2">
                                                <img src="./images/avatar1.png" alt=""
                                                    class="object-cover w-12 h-12" />
                                            </div>
                                            <a href="#" class="details">
                                                <h3 class="text-slate-800 font-bold font-xl">
                                                    Nama Course
                                                </h3>
                                                <p class="text-gray-400 font-xs">Nama Author</p>
                                                <p class="text-slate-800 font-md font-bold">
                                                    Rp300.000
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- masuk -->
                    <div class="hidden md:block relative">
                        <a href="#_"
                            class="inline-flex items-center w-full px-6 py-2 rounded-full ml-2 text-base font-semibold text-slate-800 align-middle bg-white border border-slate-800 select-none sm:mb-0 sm:w-auto hover:bg-slate-800 hover:text-white focus-within:bg-slate-800 focus-within:border-slate-800">
                            Masuk
                        </a>
                    </div>

                    <!-- daftar -->
                    <div class="hidden md:block relative">
                        <a href="#_"
                            class="inline-flex items-center w-full px-6 py-2 rounded-full ml-2 text-base font-semibold text-white align-middle bg-slate-800 border select-none sm:mb-0 sm:w-auto hover:opacity-95">
                            Daftar
                        </a>
                    </div>
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
            <!-- <div class="text-center pt-2 flex items-center mt-3">
                          <a href="index.html" class="m-0 mx-auto">
                            <img src="./images/logo.png" alt="" class="w-36" />
                          </a>
                        </div> -->
            <div class="p-3">
                <!-- search bar -->
                <div class="relative mt-3">
                    <span class="absolute left-3 top-1.5 text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
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
    <header class="bg-[#DEF6FD] mt-0 md:mt-2 rounded-md text-center md:text-left">
        <div class="container mx-auto py-10 md:py-40 md:bg-hero bg-contain bg-no-repeat bg-[right_0px_top_10px]">
            <h2 class="text-4xl font-bold mb-1 pb-3 md:pb-0">DNCC</h2>
            <h2 class="font-semibold text-4xl pb-3 md:pb-0">Learning Platfrom</h2>
            <p class="text-gray-500 my-3 w-1/2">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. A quam ad
                maiores inventore quo hic? Facilis exercitationem repellendus
                provident laudantium sunt explicabo impedit temporibus autem. Dicta
                eos harum eius. Consequatur.
            </p>
            <!-- button mulai belajar -->
            <a href="#_"
                class="relative inline-flex items-center justify-center p-4 px-7 py-3 overflow-hidden font-medium text-slate-800 transition duration-300 ease-out border-2 border-slate-800 rounded-full group mt-1">
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

            <!-- <form action="" method="get" class="mt-4">
                          <div class="flex bg-white items-center p-4">
                            <div class="basis-1/3 md:basis-3/6 relative">
                              <span class="absolute top-0.5 left-4">
                                <i class="fa-solid fa-search text-slate-300"></i>
                              </span>
                              <input
                                type="search"
                                class="pl-12 md:pl-16 pr-2 w-full outline-none focus:outline-none font-thin"
                                placeholder="Cari Materi"
                              />
                            </div>
                            <div class="basis-1/3 md:basis-2/6 flex">
                              <div>
                                <i class="fa-solid fa-cube text-gray-400 mr-2"></i>
                              </div>
                              <div class="flex-1">
                                <select
                                  name="category"
                                  id="category_id"
                                  class="bg-white text-gray-400 font-thin w-full"
                                >
                                  <option value="">Category</option>
                                  <option value="">Bootstrap</option>
                                </select>
                              </div>
                            </div>
                            <div class="justify-end">
                              <button
                                class="transition bg-red-500 text-white px-8 hover:opacity-75 rounded-full p-3 w-full ml-3"
                              >
                                Search
                              </button>
                            </div>
                          </div>
                        </form> -->

            <!-- <p class="mt-6 text-gray-600">
                          <strong>Popular Search: </strong>
                          <span class="text-gray-400"> Designer, Developer, PHP </span>
                        </p> -->
        </div>
    </header>
    <!-- End Header / Hero Section -->

    <!-- Start Categories Section -->
    <section id="categories" class="mt-12">
        <div class="container mx-auto">
            <h2 class="font-medium my-5 text-center">Browse Categories By Language</h2>

            <div class="flex flex-row gap-2 items-center text-center flex-wrap pl-4 md:pl-0 justify-center items-center">
                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/bootstrap.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Bootstrap</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FEF9EC] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/html.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">HTML</h4>
                    <p class="text-gray-500 text-xs">30 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/php.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">PHP</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/javascript.webp" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">JavaScript</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/flutter.webp" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Flutter</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FEF9EC] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/c++.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">C++</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/python.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Python</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/sql.png" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">SQL</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->
            </div>
        </div>
    </section>
    <!-- End Categories Section -->

    <!-- Start Categories By Divisi Section -->
    <section id="categories" class="mt-12">
        <div class="container mx-auto ">
            <h2 class="font-medium my-5 text-center">Browse Categories By Our Devision</h2>
            <div class="flex flex-row gap-2 items-center text-center flex-wrap pl-4 md:pl-0 justify-center items-center">
                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/web.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Web Development</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FEF9EC] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/mobile.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Mobile Development</h4>
                    <p class="text-gray-500 text-xs">30 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/game.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Game Development</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#E4F4FB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/dataAnalis.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Data Analyst Course</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/jaringan.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Jaringan Course</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->

                <div
                    class="transition basis-[45%] md:basis-[10.93%] bg-[#FCF1EB] cursor-pointer rounded mr-3 p-5 hover:opacity-75 group hover:-translate-y-2">
                    <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-125">
                        <img src="./images/icons/multimedia.svg" alt="" class="w-16 h-16" />
                    </div>
                    <h4 class="mt-4 mb-2 font-medium">Multimedia Course</h4>
                    <p class="text-gray-500 text-xs">32 Courses</p>
                </div>
                <!-- End Single Category Item -->
            </div>
        </div>
    </section>
    <!-- End Categories By Divisi Section -->

    <!-- Start Popular Courses Section -->
    <section id="courses" class="mt-12">
        <div class="container mx-auto">
            <h2 class="font-medium my-5 text-center">Popular Courses</h2>

            <div id="popular-course">
                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->
            </div>
        </div>
    </section>
    <!-- End Popular Courses Section -->

    <!-- Start New Courses Section -->
    <section id="courses" class="mt-12">
        <div class="container mx-auto">
            <h2 class="font-medium my-5 text-center">New Courses</h2>

            <div id="popular-course">
                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->

                <div class="course-item group">
                    <div
                        class="border border-gray-100 shadow-sm rounded mr-3 transition hover:shadow-md group-hover:opacity-75">
                        <img src="https://source.unsplash.com/random/400×200/?programming" alt=""
                            class="w-full rounded rounded-b-none" />
                        <div class="mt-3 p-3">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-green-600 font-bold"> Rp. 0 </span>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 text-xs">
                                <h2 class="text-base mt-3 font-medium">
                                    Front End Programming
                                </h2>
                                <p class="text-gray-400 mt-2">32 Lesson</p>
                                <div class="flex mt-5 items-center">
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                        Python
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Course Item -->
            </div>
        </div>
    </section>
    <!-- End New Courses Section -->

    <!-- Start Footer Section -->
    <footer class="bg-[#00103F] text-white mt-20">
        <div class="container mx-auto px-5 py-16">
            <div class="flex flex-col md:flex-row">
                <div class="basis-2/6">
                    <div class="p-5">
                        <img src="./images/logo.webp" alt="" class="w-10" />
                        <div>
                            <h3 class="font-medium mt-4 mb-3">Call Us</h3>
                            <div class="text-sm">
                                <h4 class="mb-2">+88019626352323</h4>
                                <h4 class="mb-2">hello@gmail.com</h4>
                                <h4 class="mb-2">9AM- 5PM, Monday - Friday</h4>
                                <h4 class="mb-2">
                                    PO Box 567, Hostain st. 433 Los Angeles, California, US
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-1/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">Links</h3>
                        <ul class="list-none mt-4">
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Start here
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Blogs
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    About us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Contact Us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Career
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Courses
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="basis-1/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">Information</h3>
                        <ul class="list-none mt-4">
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Start here
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Blogs
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    About us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Contact Us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Career
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm">
                                    <i class="fa-solid fa-chevron-right text-xs mr-3"></i>
                                    Courses
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="basis-2/6">
                    <div class="p-4">
                        <h3 class="font-medium mt-4 mb-3">Sign up for our newsletter</h3>
                        <p class="text-sm">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut
                            odit magnam officia sequi aliquid facere corporis dolorem
                            beatae? Dolore pariatur illo odio nulla atque quibusdam dicta ut
                            tempore, suscipit est.
                        </p>
                        <p class="mt-4 relative">
                            <input type="email" placeholder="Your e-mail"
                                class="w-full p-3 pl-5 bg-white rounded-full text-gray-700 placeholder:text-gray-700" />
                            <span class="absolute top-1 right-2 bg-red-600 px-5 p-2 rounded-full uppercase">
                                Subscribe
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                &copy; 2023 DNCC. All rights reserved.
            </div>

            <!-- scroll to top -->
            <div>
                <a id="scroll-to-top" href="#top"
                    class="transition hidden shadow bottom-1 right-1 w-14 h-14 rounded-[50%] bg-red-600 hover:opacity-80 z-50 border group">
                    <div class="transition pt-4 pl-4 text-white group-hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
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
    {{-- <script src="./vendors/jquery/jquery-3.6.0.min.js"></script>

    <!-- Slick Carousel JS -->
    <script src="./vendors/slick/slick.min.js"></script>

    <!-- Main JS -->
    <script src="./js/main.js"></script> --}}
@endsection
