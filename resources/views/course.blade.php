@extends('layout.main')
@section('content')
    <section class="header relative pt-0 items-center flex h-screen max-h-860-px">
        <div class="container mx-auto items-center  ">
            <div class="w-full  px-4 mx-auto items-center text-center">
                <div class="pt-0 sm:pt-0">
                    <div class="">
                        <img class="mx-auto rounded-full" src="{{ $category->photo }}" alt="" width="20%">
                    </div>
                    <h2 class="font-semibold text-4xl
                            text-blueGray-600 mt-2">
                        Menjadi Seorang {{ $category->name }}
                    </h2>
                    <p class="mt-4 text-lg leading-relaxed text-blueGray-500">

                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-0 md:mt-0 pb-10 relative bg-blueGray-600 text-white">
        <div class="justify-center text-center flex flex-wrap mt-0 ">
            <div class="w-full md:w-6/12 px-12 md:px-4 pt-6">
                <h2 class="font-semibold text-4xl">{{ 'DAFTAR COURSE' }}</h2>
            </div>
        </div>
    </section>
    <section class="block relative z-1 bg-blueGray-600 text-blueGray-300 pt-32">
        <div class="container mx-auto">
            <div class="justify-center flex flex-wrap">
                <div class="w-full lg:w-12/12 px-4 -mt-24">
                    <div class="flex flex-wrap">
                        @foreach ($courses as $course)
                            <div class="w-1/2 lg:w-4/12 px-4">
                                <a href="">
                                    <div
                                        class="card hover:-mt-4
                                    relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg
                                    ease-linear transition-all duration-150">
                                        <div class="card-head">
                                            <img alt="..."
                                                class="align-middle border-none max-w-full h-auto rounded-lg"
                                                src=" /{{ asset($course->photo)  }}" />
                                        </div>
                                        <div class="card-body px-3">
                                            <h5 class="text-xl font-semibold pb-4 text-center text-blueGray-800">
                                                {{ $course->title }}
                                            </h5>
                                            <p>
                                                {{ 'Rp ' . number_format($course->price) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-20 bg-blueGray-200 relative pt-16 text-center">
        <h5 class="text-xl font-semibold pb-4 text-center text-blueGray-800">
            {{ 'KATEGORI LAINNYA' }}
        </h5>
        <div class="row">
            @foreach ($categories as $ctr)
                <div class="col"><a href="/category/{{ $ctr->id }}">{{ $ctr->name }}</a></div>
            @endforeach
        </div>
    </section>
@endsection
