@extends('layouts.home-layout')

@section('body')
    <section>

        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
                <img class="w-full" alt="image of a girl posing"
                    src="https://images.unsplash.com/photo-1536782376847-5c9d14d97cc0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZnJlZXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" />

            </div>
            <div class="md:hidden">
                <img class="w-full" alt="image of a girl posing"
                    src="https://images.unsplash.com/photo-1536782376847-5c9d14d97cc0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZnJlZXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" />

            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">

                    <h1
                        class="lg:text-4xl text-3xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white my-2">
                        {{ $course->title }}</h1>
                    <div class="flex  mt-4 ">
                        <div class="flex   ">
                            <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                                <p>{{ $course->category->name }}</p>
                            </span>
                        </div>
                        <div class="ml-4 text-gray-500">
                            <p class="text-gray-400 mt-1">{{ count($course->lessons) }} Lesson</p>
                        </div>

                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-start flex-col ">
                    <p class="text-lg leading-4 text-gray-800 dark:text-gray-300">Description</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{ $course->description }}
                        </p>
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    @if ($course->price == 0)
                        <a href="{{ route('freeCourse', ['id_course' => $course->id]) }}"
                            class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none rounded-md">
                            Start Free Course
                        </a>
                    @else
                        <p>{{ $course->price }}</p>
                        <button class=" bg-indigo-500 text-white py-2 px-6 rounded-md hover:bg-indigo-600">
                            Enroll Now
                        </button>
                    @endif
                </div>
                @php
                    $menit = count($course->lessons) * 10;
                    $no = 1;
                @endphp
                <div class="py-4 border-b border-gray-200 flex items-start flex-col ">
                    <p class="text-lg leading-4 text-gray-800 dark:text-gray-300">Course Content</p>
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">{{ count($course->lessons) }}
                        sections • {{ $menit }} minutes total length</p>
                    <ul class="relative m-0 w-full list-none overflow-hidden p-0 transition-[height] duration-200 ease-in-out"
                        data-te-stepper-init data-te-stepper-type="vertical">
                        <!--First item-->
                        @foreach ($course->lessons as $lesson)
                            <li data-te-stepper-step-ref
                                class="relative h-fit after:absolute after:left-[2.45rem] after:top-[3.6rem] after:mt-px after:h-[calc(100%-2.45rem)] after:w-px after:bg-[#e0e0e0] after:content-[''] dark:after:bg-slate-800">
                                <div data-te-stepper-head-ref
                                    class="flex cursor-pointer items-center p-6 leading-[1.3rem] no-underline after:bg-[#e0e0e0] after:content-[''] hover:bg-[#f9f9f9] focus:outline-none dark:after:bg-slate-800 dark:hover:bg-[#3b3b3b]">
                                    <span data-te-stepper-head-icon-ref
                                        class="mr-3 flex h-[1.938rem] w-[1.938rem] items-center justify-center rounded-full bg-[#ebedef] text-sm font-medium text-[#40464f]">
                                        {{ $no }}
                                    </span>
                                    <span data-te-stepper-head-text-ref
                                        class="text-slate-800 after:absolute after:flex after:text-[0.8rem] after:content-[data-content] dark:text-slate-300">
                                        {{ $lesson->title }}
                                    </span>
                                </div>
                                <div data-te-stepper-content-ref
                                    class="transition-[height, margin-bottom, padding-top, padding-bottom] left-0 overflow-hidden pb-6 pl-[3.75rem] pr-6 duration-300 ease-in-out">
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
        <div class="bg-white py-6 sm:py-14">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl sm:text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Opsi Pembayaran</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">"Tidak ada kesalahan dalam berinvestasi pada
                        pendidikan, Langkah ini adalah langkah bijak untuk
                        masa depan yang cerah."</p>
                </div>
                <div
                    class="mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                    <div class="p-8 sm:p-10 lg:flex-auto">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900">Akses Selamanya</h3>
                        <p class="mt-6 text-base leading-7 text-gray-600">Nikmati akses tak terbatas ke komprehensif
                            kami
                            Konten kursus dan tingkatkan keterampilan Anda dengan sumber daya eksklusif kami.</p>
                        <div class="mt-10 flex items-center gap-x-4">
                            <h4 class="flex-none text-sm font-semibold leading-6 text-slate-800">What’s Included</h4>
                            <div class="h-px flex-auto bg-gray-100"></div>
                        </div>
                        <ul role="list"
                            class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-slate-800" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses Materi Kelas Premium
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-slate-800" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Konsultaisi dengan para mentor
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-slate-800" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses kelas dimana saja
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-slate-800" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Sertifikat kelulusan kursus
                            </li>
                        </ul>
                    </div>
                    <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                        <div
                            class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                            <div class="mx-auto max-w-xs px-8">
                                <p class="text-base font-semibold text-gray-600">Investasikan Sekarang</p>
                                <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                    <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">Rp</span>
                                    <span
                                        class="text-5xl font-bold tracking-tight text-gray-900">{{ $course->price }}</span>
                                </p>
                                <a href="#"
                                    class="mt-10 block w-full rounded-md bg-slate-800 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enroll
                                    Now</a>
                                <p class="mt-6 text-xs leading-5 text-gray-600">Receipts and Invoices for Reimbursement
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
