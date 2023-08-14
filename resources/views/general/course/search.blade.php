@extends('layouts.home-layout')
@section('body')

<section class="pt-20 px-24">
    <div class="pt-8 text-center">
        <p class="text-3xl font-bold text-blue-500 mb-1">Temukan Cepat</p>
        <div class="gap-2">
            <p class="text-xl mb-2">Paling sering dicari:
                @foreach ($coursesPopuler as $course)
                <a href="#">
                    <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold hover:bg-[#FFF5EC]">{{ $course->category->name }}</span>
                </a>
                @endforeach
        </div>
        </p>
    </div>
    <div class="py-8">
        @if (count($coursesPopuler) === 0)
        <div class="p-24 text-center">
            <p class="text-xl font-semibold">Maaf, hasil tidak ditemukan. Coba cari kata kunci lain😊.</p>
        </div>
        @else
        <p class="py-8 text-xl font-semibold">Ditemukan ({{ count($coursesPopuler) }})</p>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($coursesPopuler as $course)
            <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price" :count="count($course->lessons)" :photo="$course->photo" />
            @endforeach
        </div>
        @endif
    </div>
</section>
<!-- <div class="min-h-screen">
   {{-- @foreach ($course as $item)
    {{ $item->title }}
    @endforeach --}}
</div> -->
@endsection