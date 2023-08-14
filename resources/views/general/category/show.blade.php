@extends('layouts.home-layout')
@section('body')
<section class="md:pt-20 pt-5 md:px-24 px-24">
    <div class="pt-8">
        <p class="text-lg font-semibold text-blue-500 mb-1">#EasyLearnWithUs</p>
        @foreach ($courses as $course)
        <p class="text-2xl mb-2 dark:text-white">Kelas {{ $course->category->name }} </p>
        <p class="text-base">{{ $course->category->description }}</p>
        @php
        break;
        @endphp
        @endforeach
    </div>
    <div class="py-8">
        <p class="py-8 text-xl font-semibold dark:text-white">Kelas Terpopuler saat ini</p>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($coursesPopuler as $course)
            <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price" :count="count($course->lessons)" :photo="$course->photo" />
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
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($courses as $course)
            <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price" :count="count($course->lessons)" :photo="$course->photo" />
            @endforeach

        </div>
    </div>
</section>
@endsection