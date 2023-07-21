@extends('layouts.main')
@section('content')
    <div class="md:p-16  bg-teal-100">
        <div class="flex lg:flex-row flex-col align-items-center p-5 justify-center w-3/4 mx-auto ">
            <div class="p-7 hidden lg:block">
                <img src="{{ $course->photo }}" alt="" class=" object-cover">
            </div>
            <div class="p-7 ">
                <div class="flex-row justify-content-center align-items-center">
                    <p class="text-xl ">{{ $course->category->name }}</p>
                    <p class="text-2xl uppercase">{{ $course->title }}</p>
                    <hr>
                    <p class="text-sm">{!! $course->description !!}</p>
                </div>

            </div>
            <div class="flex-none align-items-center w-64 ">
                <div class="p-7">
                    <div class=" bg-white flex flex-col p-5 border border-solid border-black rounded-md justify-center">


                        <a href="{{ route('course.lesson.detail', ['id' => $course->id, 'chapter' => 1]) }}"><button
                                class="border border-solid border-black text-white bg-teal-500 p-2 rounded-md hover:bg-teal-700 m-2">Belajar
                                Sekarang</button></a>


                        @role('author')
                            <a href="{{ route('author_lesson_create', ['course_id' => $course->id]) }}"><button
                                    class="border border-solid border-black text-white bg-teal-500 p-2 rounded-md hover:bg-teal-700 m-2">tambah
                                    materi</button></a>
                        @endrole

                        <button
                            class="border-solid border border-black text-black-500 bg-gray-100 p-2 rounded-md hover:bg-gray-300 m-1">Lihat
                            Silabus</button>

                    </div>

                </div>
            </div>


        </div>
    </div>
    <div class="md:px-24 px-8 my-16">
        <div class="mb-5">
            <strong>Apa yang anda dapatkan dari course ini?</strong>
        </div>
        <div class="flex lg:flex-row flex-col gap-8 justify-center ">
            <div class="border border-solid border-black rounded-md">
                <div class="flex flex-row w-full align-items-center justify-content-center sm:p-2 xl:p-8 lg:p-4 gap-3">
                    <div class="p-3 text-2xl">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="p-3">
                        <strong>Sertifikat</strong>
                        <p>Dapatkan sertifikat standar Industri setelah menyelesaikan kelas ini</p>
                    </div>
                </div>

            </div>
            <div class="border border-solid border-black rounded-md">
                <div class="flex flex-row w-full align-items-center justify-content-center xl:p-10 lg:p-5 gap-3">
                    <div class="p-3 text-2xl">
                        <i class="fas fa-puzzle-piece"></i>
                    </div>
                    <div class="p-3">
                        <strong>Modul</strong>
                        <p>Tingkatkan pengetahuan Anda dengan menyelesaikan modul ini</p>
                    </div>
                </div>

            </div>
            <div class="border border-solid border-black rounded-md">
                <div class="flex flex-row  w-full align-items-center justify-content-center  xl:p-10 lg:p-5 gap-3 ">
                    <div class="p-3 text-2xl">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="p-3">
                        <strong>Tugas</strong>
                        <p>Terapkan konsep-konsep yang telah Anda pelajari dalam tugas ini</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="bottom-section">
        <div
            class="mx-auto mb-16 w-full max-w-sm md:max-w-xl p-4 bg-white border border-black rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Kelas Permanen</h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
                <span class="text-3xl font-semibold">Rp</span>
                <span class="text-5xl font-semibold tracking-tight">{{ number_format($course->price, 0, ',', '.') }}</span>

                <span class="text-xl">,00</span>
            </div>
            <span class="text-md ">Miliki akses materi premium dan permanen dan buatlah sebuah studi kasus
                bermanfaat</span>
            <hr class="mt-5 ">

            <ul role="list" class="space-y-5 my-7">
                <li class="flex space-x-3 items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Akses Kelas
                        Selamanya</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Sertifikat
                        Kelulusan</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Modul
                        Berkualitas</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Update
                        Materi secara berkala</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Akses Bertanya
                        kepada
                        Pengajar</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Video
                        Materi</span>
                </li>
            </ul> <a href="{{ route('summaryPayment', ['id' => $course->id, 'user_id' => Auth::id()]) }}">
                <button type="button"
                    class="my-5 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">
                    Bayar
                    Sekarang</button></a>
            <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-1">
                    <button type="button"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-between w-full text-center"
                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                        aria-controls="accordion-collapse-body-1">
                        <span>Gunakan Code Voucher</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <form class="flex items-center" action="{{ route('payment.voucher', $course->id) }}"
                            method="POST">
                            @csrf
                            <label for="voice-search" class="sr-only">Search</label>
                            <div class="relative w-full">

                                <input type="text" id="voice-search" name="token"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Kode Voucher Kelas" required>

                            </div>
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>


    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    {{-- @foreach ($lessons as $lesson)
        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="{{ route('course.lesson.detail', ['id' => $lesson->id, 'chapter' => $lesson->chapter]) }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                detail
            </a>
            <a href="route"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                edit
            </a>
            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                hapus
            </a>
        </div>
    @endforeach --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    @if (session('status') === 'unpaid')
        <script>
            // Redirect to the bottom of the page (to the element with ID "bottom-section")
            window.location.hash = '#bottom-section';
        </script>
    @endif
@endsection
