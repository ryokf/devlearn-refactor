@extends('layouts.main')
@section('content')
    <section class="pt-32 px-24 ">
        <div class="pt-8">
            <p class="text-lg font-semibold text-blue-500 mb-1">#EasyLearnWithUs</p>
            @foreach ($courses as $course)
                <p class="text-2xl mb-2 ">Kelas {{ $course->category->name }} </p>
                <p class="text-base">Belajar mendeasin website menjadi lebih baik dan estetik</p>
                @php
                    break;
                @endphp
            @endforeach
        </div>
        <div class="py-8">
            <p class="py-8 text-xl font-semibold">Kelas Terpopuler saat ini</p>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($coursesPopuler as $course)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg flex-wrap w-full h-36" src="{{ $course->photo }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $course->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ Str::limit($course->description, 100) }}</p>
                            <div class="flex justify-between ">
                                <a href="{{ route('course.detail', $course) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail Course
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                                <p class="text-lg font-semibold">Price : Rp{{ $course->price }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="pt-8 pb">
            @foreach ($courses as $course)
                <p class="py-8 text-xl font-semibold">Semua Kelas {{ $course->category->name }}</p>
                @php
                    break;
                @endphp
            @endforeach
        </div>

        <div class="py-8  gap-5 flex-row flex mb-10">
            <div class="hidden md:block">
                {{-- filter --}}
                <div>
                    <p class="text-lg mb-3">Filter</p>
                    <form action="">
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">New Course</label>
                        </div>
                    </form>
                    <form action="">
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Populer Course</label>
                        </div>
                    </form>
                </div>
                {{-- endFilter --}}
                {{-- Type --}}
                <p class="text-lg mb-3">Type</p>
                <form action="">
                    <div class="flex items-center mb-4">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Free</label>
                    </div>
                </form>
                <form action="">
                    <div class="flex items-center mb-4">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Premium</label>
                    </div>
                </form>

                {{-- end type --}}
            </div>
            <div>

                <div class="px-5 lg:ml-10 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 ">
                    @foreach ($courses as $course)
                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('course.detail', $course) }}">
                                <img class="rounded-t-lg flex-wrap w-full h-36" src="{{ $course->photo }}" alt="" />

                                <div class="p-5">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $course->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ Str::limit($course->description, 100) }}</p>
                            <div class="flex justify-between ">
                                <a href="{{ route('course.detail', $course) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail Course
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                                <p class="text-lg font-semibold">Price : Rp{{ $course->price }}</p>
                            </div>
                        </div>
                </div>
                @endforeach

            </div>
        </div>
        </div>
    </section>
@endsection
