@extends('layouts.home-layout')
@section('body')
    <section class="pt-24 px-24 ">
        <div class="pt-8">
            <p class="text-lg font-semibold text-blue-500 mb-1">#EasyLearnWithUs</p>
            @foreach ($courses as $course)
                <p class="text-2xl mb-2 ">Kelas {{ $course->category->name }} </p>
                <p class="text-base">Jika kamu tidak tahan terhadap penatnya belajar, maka kamu akan menanggung
                    pedihnya
                    kebodohan (Imam Syafi'i)</p>
                @php
                    break;
                @endphp
            @endforeach
        </div>
        <div class="py-8">
            <p class="py-8 text-xl font-semibold">Kelas Terpopuler saat ini</p>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($coursesPopuler as $course)
                    <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price" :count="count($course->lessons)"
                        :photo="$course->photo" />
                @endforeach


            </div>
        </div>
        <div class="py-8">
            @foreach ($courses as $course)
                <p class="py-8 text-xl font-semibold">Semua Kelas {{ $course->category->name }}</p>
                @php
                    break;
                @endphp
            @endforeach
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($courses as $course)
                    <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price"
                        :count="count($course->lessons)" :photo="$course->photo" />
                @endforeach

            </div>
        </div>
    </section>
@endsection
