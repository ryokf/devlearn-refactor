@extends('layouts.home-layout')

@section('body')
    <section>

        <div class="items-start justify-center px-4 pt-8 pb-12 md:flex 2xl:px-20 md:px-6">
            <div class="hidden xl:w-2/6 lg:w-2/5 w-80 md:block">
                <img class="w-full shadow-inner rounded-xl shadow-white" alt="{{ $course->title }}"
                    src="{{ asset('storage/' . $course->photo) }}" />

            </div>
            <div class="md:hidden ">
                <img class="w-full shadow-inner rounded-xl shadow-white" alt="{{ $course->title }}"
                    src="{{ asset('storage/' . $course->photo) }}" />

            </div>
            <div class="mt-6 xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0">
                <div class="pb-6 border-b border-gray-200">

                    <h1
                        class="my-2 text-3xl font-semibold leading-7 text-gray-800 lg:text-4xl lg:leading-6 dark:text-white">
                        {{ $course->title }}</h1>
                    <div class="flex mt-4 ">
                        <div class="flex ">
                            <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                <p>{{ $course->category->name }}</p>
                            </span>
                        </div>
                        <div class="ml-4 text-gray-500">
                            <p class="mt-1 text-gray-400">{{ count($course->lessons) }} Lesson</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col items-start py-4 border-b border-gray-200 ">
                    <p class="text-lg leading-4 text-gray-800 dark:text-gray-300">Description</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{ $course->description }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between py-4 border-b border-gray-200">
                    @if ($course->price == 0)
                        <a href="{{ route('freeCourse', ['id_course' => $course->id]) }}"
                            class=" focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gradient-to-bl from-cyan-400 dark:from-purple-600 via-10% to-blue-500 dark:to-purple-700 shadow-inner shadow-zinc-100 dark:shadow-zinc-300 transition-all w-full py-4 hover:bg-gray-700 focus:outline-none rounded-lg">
                            Start Free Course
                        </a>
                    @else
                        <p>{{ $course->price }}</p>
                        <button class="px-6 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600">
                            Enroll Now
                        </button>
                    @endif
                </div>
                @php
                    $menit = count($course->lessons) * 10;
                    $no = 1;
                @endphp
                <div class="flex flex-col items-start py-4 border-b border-gray-200 ">
                    <p class="text-lg leading-4 text-gray-800 dark:text-gray-300">Course Content</p>
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">{{ count($course->lessons) }}
                        sections • {{ $menit }} minutes total length</p>
                    <ul class="relative m-0 w-full list-none overflow-hidden p-0 transition-[height] duration-200 ease-in-out"
                        data-te-stepper-init data-te-stepper-type="vertical">
                        <!--First item-->
                        @foreach ($course->lessons as $lesson)
                            <li data-te-stepper-step-ref
                                class="relative transition-all hover:text-[17px] hover:shadow-inner hover:shadow-white dark:hover:shadow-zinc-200 hover:bg-white dark:hover:bg-opacity-10 rounded-xl h-fit after:absolute after:left-[2.45rem] after:top-[3.6rem] after:mt-px after:h-[calc(100%-2.45rem)] after:w-px after:bg-[#e0e0e0] after:content-[''] dark:after:bg-slate-800">
                                <div data-te-stepper-head-ref
                                    class="flex cursor-pointer items-center p-6 leading-[1.3rem] no-underline after:bg-[#e0e0e0] after:content-['']  focus:outline-none dark:after:bg-slate-800 ">
                                    <span data-te-stepper-head-icon-ref
                                        class="mr-3 flex aspect-square z-10 h-8 w-8 items-center justify-center rounded-full text-white bg-gradient-to-bl from-cyan-400 dark:from-purple-600 via-10% to-blue-500 dark:to-purple-700 shadow-inner shadow-zinc-100 dark:shadow-zinc-300 text-sm font-medium">
                                        {{ $no }}
                                    </span>
                                    <span data-te-stepper-head-text-ref
                                        class="text-zinc-800 font-medium dark:text-white after:absolute after:flex after:text-[0.8rem] after:content-[data-content] dark:text-slate-300">
                                        {{ $lesson->title }}
                                    </span>
                                </div>
                                <div data-te-stepper-content-ref
                                    class="dark:text-zinc-400 transition-[height, margin-bottom, padding-top, padding-bottom] left-0 overflow-hidden pb-6 pl-[3.75rem] pr-6">
                                    {{ $lesson->description }}
                                </div>
                            </li>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </ul>

                </div>


            </div>


        </div>



    </section>
    <section>
        <div class="bg-white dark:bg-[#303150]  py-6 sm:py-14">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div class="max-w-2xl mx-auto sm:text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">Opsi Pembayaran
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-zinc-400">"Tidak ada kesalahan dalam
                        berinvestasi pada
                        pendidikan, Langkah ini adalah langkah bijak untuk
                        masa depan yang cerah."</p>
                </div>
                <div
                    class="items-center max-w-2xl mx-auto mt-16 border shadow-inner rounded-3xl dark:border-none shadow-white dark:shadow-zinc-200 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none bg-white/5">
                    <div class="p-8 sm:p-10 lg:flex-auto">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Akses Selamanya</h3>
                        <p class="mt-6 text-base leading-7 text-gray-600 dark:text-zinc-400">Nikmati akses tak terbatas ke
                            komprehensif
                            kami
                            Konten kursus dan tingkatkan keterampilan Anda dengan sumber daya eksklusif kami.</p>
                        <div class="flex items-center mt-10 gap-x-4">
                            <h4 class="flex-none text-sm font-semibold leading-6 text-slate-800 dark:text-white">What’s
                                Included</h4>
                            <div class="flex-auto h-px bg-gray-100"></div>
                        </div>
                        <ul role="list"
                            class="grid grid-cols-1 gap-4 mt-8 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                            <li class="flex gap-x-3 dark:text-zinc-400">
                                <svg class="flex-none w-5 h-6 text-slate-800 dark:text-white" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses Materi Kelas Premium
                            </li>
                            <li class="flex gap-x-3 dark:text-zinc-400">
                                <svg class="flex-none w-5 h-6 text-slate-800 dark:text-white" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Konsultaisi dengan para mentor
                            </li>
                            <li class="flex gap-x-3 dark:text-zinc-400">
                                <svg class="flex-none w-5 h-6 text-slate-800 dark:text-white" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses kelas dimana saja
                            </li>
                            <li class="flex gap-x-3 dark:text-zinc-400">
                                <svg class="flex-none w-5 h-6 text-slate-800 dark:text-white" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Sertifikat kelulusan kursus
                            </li>
                        </ul>
                    </div>
                    <div class="p-2 -mt-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                        <div
                            class="py-10 text-center rounded-2xl ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                            <div class="max-w-xs px-8 mx-auto">
                                <p class="text-base font-semibold text-gray-600 dark:text-white">Investasikan Sekarang</p>
                                <p class="flex items-baseline justify-center mt-6 gap-x-2">
                                    <span
                                        class="text-sm font-semibold leading-6 tracking-wide text-gray-600 dark:text-white">Rp</span>
                                    <span
                                        class="text-5xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $course->price }}</span>
                                </p>
                                <a href="#"
                                    class="mt-10 block w-full rounded-md bg-gradient-to-bl from-cyan-400 dark:from-purple-600 via-10% to-blue-500 dark:to-purple-700 shadow-inner shadow-zinc-100 dark:shadow-zinc-300 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enroll
                                    Now</a>
                                <p class="mt-6 text-xs leading-5 text-gray-600 dark:text-zinc-400">Receipts and Invoices for
                                    Reimbursement
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
