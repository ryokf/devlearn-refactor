@extends('layouts.home-layout')
@section('body')
    <section class="md:pt-14 pt-5 px-5">
        <div class="sm:px-10 md:px-14">
            <div class="pt-8">
                <p class="text-lg font-semibold text-blue-500 mb-1">#EasyLearnWithUs</p>
                @foreach ($courses as $course)
                    <p class="text-2xl mb-2 dark:text-white">Kelas {{ $course->category->name }} </p>
                    <p class="text-base dark:text-zinc-400">{{ $course->category->description }}</p>
                    @php
                        break;
                    @endphp
                @endforeach
            </div>
            <div class="py-8">
                <p class="py-8 text-xl font-semibold dark:text-white">Kelas Terpopuler saat ini</p>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
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
                <div class="grid grid-cols-4">
                    <div class="hidden sm:block col-span-1">
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

                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 col-span-4 md:col-span-3 gap-4">
                        @foreach ($courses as $course)
                            <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price"
                                :count="count($course->lessons)" :photo="$course->photo" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
