@extends('layouts.home-layout')
@section('body')
    <section class="px-5 pt-5 md:pt-14">
        <div class="sm:px-10 md:px-14">
            <div class="pt-8">
                <p class="mb-1 text-lg font-semibold text-blue-500">#EasyLearnWithUs</p>
                @foreach ($courses as $course)
                    <p class="mb-2 text-2xl dark:text-white">Kelas {{ $course->category->name }} </p>
                    <p class="text-base dark:text-zinc-400">{{ $course->category->description }}</p>
                    @php
                        break;
                    @endphp
                @endforeach
            </div>
            <div class="py-8">
                <p class="py-8 text-xl font-semibold dark:text-white">Kelas Terpopuler saat ini</p>
                <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($coursesPopuler as $course)
                        <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price"
                            :count="count($course->lessons)" :photo="$course->photo" />
                    @endforeach
                </div>
            </div>
            <div class="py-8">
                @foreach ($courses as $course)
                    <p class="py-8 text-xl font-semibold dark:text-white">Semua Kelas {{ $course->category->name }}</p>
                    @php
                        break;
                    @endphp
                @endforeach
                <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    {{-- <div class="hidden col-span-1 sm:block">
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                        </div>
                        <div class="flex items-center">
                            <input checked id="checked-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checked-checkbox"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checked state</label>
                        </div>

                    </div> --}}

                    @foreach ($courses as $course)
                        <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price"
                            :count="count($course->lessons)" :photo="$course->photo" />
                    @endforeach

                </div>
            </div>
        </div>

    </section>
@endsection
