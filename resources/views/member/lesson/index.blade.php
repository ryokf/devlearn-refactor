<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/c473da0646.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>
        DevLearn
    </title>
</head>

<body class="text-blueGray-700 antialiased">

    <noscript>You need to enable JavaScript to run this app.</noscript>
    <!-- Start Navbar -->
    <nav class="bg-white shadow p-4 sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <!-- nav -->
                <div class="flex justify-center items-center text-slate-800">
                    <div class="min-w-max inline-flex relative">
                        <a href="/">
                            <img src="{{ asset('landingpage/images/logo_dl.png') }}" class="w-full h-12"
                                alt="" />
                        </a>
                    </div>

                </div>



                <!--  masuk, daftar -->
                <div class="flex my-auto pr-0 md:pr-5">
                    @if (Auth::user())
                        <!-- dropdown avatar -->
                        <div class="relative">

                            <div x-data="{ open: false }" class="w-full inline-flex flex  items-center">
                                <!-- close -->
                                <div @click="open = !open" class="relative border-b-4 border-transparent ">
                                    <div class="flex justify-center items-center space-x-3 cursor-pointer">
                                        <div
                                            class="w-10 h-10 rounded-full overflow-hidden border-2  border-slate-800 hover:opacity-90">
                                            <img src="{{ asset('landingpage/images/course1.png') }}" alt=""
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="text-slate-800 mx-auto font-semibold">
                                            <div class="cursor-pointer hidden md:block">
                                                {{ Auth::user()->name }}
                                            </div>

                                        </div>
                                    </div>

                                    <!-- open -->
                                    <div x-show="open"
                                        class="absolute w-50 py-2 bg-white  shadow-md border dark:border-transparent mt-3 hidden md:block"
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
                                                <a href="#"
                                                    class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                    Pengaturan
                                                </a>
                                            </li>
                                            <li>
                                                <hr class="border-slate-200 mx-4">
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button
                                                        class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4 hover:border-red-600 text-red-600 w-full type="submit">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                            </path>
                                                        </svg>
                                                        Keluar
                                                    </button>
                                                </form>
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
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button
                                                    class="block bg-white hover:bg-slate-50 py-4 px-8 flex gap-4 hover:border-red-600 text-red-600 w-full type="submit">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                        </path>
                                                    </svg>
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


            </div>
        </div>

    </nav>
    <!-- End Navbar -->
    <div id="root">
        {{-- Sidebar --}}
        <div
            class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-80 z-10 py-4 px-6">
            <div
                class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
                <button
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                    <i class="fas fa-bars"></i>
                </button>
                <p class="font-bold text-sm md:text-xl md:mt-24">{{ $course->title }}</p>
                <p class="text-xs hidden md:block font-semibold text-gray-400">1 / 12 Progress</p>
                <p class="text-xs hidden md:block font-semibold text-gray-400">80% Complete</p>
                <ul class="md:hidden items-center flex flex-wrap list-none">
                </ul>
                <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
                    id="example-collapse-sidebar">
                    <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                        <div class="flex flex-wrap">
                            <div class="w-6/12">
                                <p class="font-semibold ">{{ $course->title }}</p>

                            </div>
                            <div class="w-6/12 flex justify-end">
                                <button type="button"
                                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                    onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                        @foreach ($lessons as $lesson)
                            <li class="items-center">
                                <a href="{{ route('lesson.show', ['id' => $course->id, 'chapter' => $lesson->chapter]) }}"
                                    class="w-11/12 text-xs uppercase py-3 font-bold block duration-100
                                       {{ request()->routeIs('lesson.show') && request('id') == $course->id && request('chapter') == $lesson->chapter ? 'bg-slate-800 text-slate-100 px-2 rounded-xl ml-1' : 'text-blueGray-700 hover:text-blueGray-500 hover:ml-2' }}">
                                    Chapter {{ $lesson->chapter }} - {{ $lesson->title }}

                                </a>
                                @role('member')
                                    @if ($lesson->pivot->status == true)
                                        <p class="text-green-500 uppercase">Sudah Selesai</p>
                                    @else
                                        <p class="text-red-500 uppercase">Belum Selesai</p>
                                    @endif
                                    <hr class="mb-1">
                                @endrole
                            </li>
                        @endforeach
                    </ul>
                    <ul>
                        <li>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- EndSidebar --}}
        <div class="relative md:ml-80 md:px-12">

            @foreach ($lesson_detail as $item)
                <div class="px-4 md:px-10 mx-auto w-full  mb-8">
                    <p class="text-xl font-semibold bg-white p-4">{{ $item->chapter }} .
                        {{ $item->title }}</p>
                    <div class="p-8 flex flex-col md:flex-row md:space-x-8 justify-center items-center">
                        <div class="w-full h-0 relative" style="padding-bottom: 56.25%;">
                            <iframe class="w-full h-full absolute inset-0 object-cover"
                                src="https://youtube.com/embed/{{ $item->media_link }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="mt-2 leading-relaxed">{!! $item->text_content !!}</div>
                    </div>
                </div>

                <!-- Next button -->
                <div class="px-4 md:px-10 mx-auto w-full mb-8 flex justify-end">
                    @if ($nextChapter)
                        <form action="{{ route('lesson.next', ['id' => $course->id, 'chapter' => $nextChapter]) }}"
                            method="post">
                            @csrf
                            <input hidden type="text" name="id_lesson" value="{{ $item->id }}">
                            <button type="submit"
                                class="bg-slate-800 hover:bg-blue-900 text-white font-bold py-2 px-10 rounded">Next
                                Chapter</button>
                        </form>
                    @endif
                    @if ($lastChapter)
                        Sudah Selesai
                    @endif
                </div>
            @endforeach
            {{-- <x-author_footer class="" /> --}}

            <hr>
            <div class="container mt-5">
                <div class=" mb-10">
                    <h1 class="text-xl font-bold">Forum pembahasan</h1>
                    <p class="text-gray-400">bergabung bersama yang lain dalam membahas maetri tersebut, pertanyaan yang
                        anda tanyakan akan segera mentor balas</p>
                </div>
                {{-- @dd($comments) --}}
                @if (count($comments) == 0)
                    <h1 class="text-center font-semibold text-xl my-10">belum ada diskusi pada materi ini</h1>
                @else
                    @foreach ($comments as $comment)
                        {{-- <x-comment-section :name="$comment->user->name", :photo="$comment->user->photo", :comment="$comment->comment" :userId="$comment->user->id" /> --}}
                        <x-comment-section :id="$comment->id" :userId="$comment->user_id" :name="$comment->user->name" :photo="$comment->user->photo"
                            :comment="$comment->comment"></x-comment-section>
                    @endforeach
                    <div class="mt-10">
                        {{ $comments->links() }}
                    </div>
                @endif



                <div class="mt-5">
                    <form action="{{ route('comment.store') }}" method="post" class="flex items-center">
                        @csrf

                        <input type="hidden" name="lesson_id" value="{{ $id_lesson->id }}">

                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-regular fa-message"></i>
                            </div>
                            <input type="text" id="simple-search" name="comment"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="tuliskan komentar anda..." required>
                        </div>
                        <button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-slate-700 rounded-lg border border-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                            <i class="fa-regular fa-paper-plane" style="color: #ffffff;"></i>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>

                </div>
            </div>
            <hr class="mt-5">

            <!-- Start Footer Section -->
            <footer class="bg-white">
                <div class="mx-auto container space-y-8 py-16 lg:space-y-16">
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 ">
                        <div>
                            <div class="h-8">
                                <img src="{{ asset('landingpage/images/logo-dncc.webp') }}" class="w-25 h-10"
                                    alt="" />
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
                                    <a href="https://www.instagram.com/dnccsemarang/?hl=id" rel="noreferrer"
                                        target="_blank" class="text-gray-700 transition hover:opacity-75">
                                        <span class="sr-only">Instagram</span>

                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://www.youtube.com/channel/UCbGj3OU4Qq8KOgaY9zuyZsA"
                                        rel="noreferrer" target="_blank"
                                        class="text-gray-700 transition hover:opacity-75">
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
                                        class="text-gray-700 transition hover:opacity-75">
                                        <span class="sr-only">GitHub</span>

                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
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
                                        <a href="https://dnccudinus.org/"
                                            class="text-gray-700 transition hover:opacity-75">
                                            Website Resmi DNCC
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://dinus.ac.id/"
                                            class="text-gray-700 transition hover:opacity-75">
                                            Website Resmi Universitas
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- kategori -->
                            <div>
                                <p class="font-medium text-gray-900">Kategori</p>

                                <ul class="mt-6 space-y-4 text-sm">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('category.show', [$category->id]) }}"
                                                class="text-gray-700 transition hover:opacity-75">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- developer -->
                            <div>
                                <p class="font-medium text-gray-900">Tentang Developer</p>

                                <ul class="mt-6 space-y-4 text-sm">
                                    <li>
                                        <a href="https://github.com/ryokf"
                                            class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
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
                                            class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
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
                                            class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
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
                                            class="text-gray-700 transition hover:opacity-75 flex items-center text-sm">
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

                    <p class="text-xs text-gray-500 text-center">
                        &copy; 2023. DNCC. All rights reserved.
                    </p>
                </div>
            </footer>
            <!-- End Footer Section -->
        </div>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script>
        function enableFullscreen() {
            var iframe = document.querySelector('iframe');
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) { // Firefox
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari, Opera
                iframe.webkitRequestFullscreen();
            }
        }
    </script>


    <script>
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById("get-current-year").innerHTML =
                    new Date().getFullYear();
            }
        })();
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>


</html>
