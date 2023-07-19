@extends('author.layout')

@section('body')
    <div class="relative md:ml-72 bg-blueGray-50">
        <!-- Header -->
        <x-author_header></x-author_header>
        <div class="relative bg-primary md:pt-32 pb-32 pt-12">
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-36 ">
            <div class="flex flex-wrap mt-4">
                <div class="md:p-5 max-w-6xl mx-auto mb-10 z-10 bg-white border shadow-lg rounded">
                    <div class="flex lg:flex-row flex-col items-center p-1 justify-center w-3/4 mx-auto">
                        <div class="p-1 hidden lg:block aspect-square w-[300px] h-[300px] rounded-lg">
                            <img src="{{ $course->photo }}" alt="" class=" object-cover rounded-lg">
                        </div>
                        <div class="mx-4"></div>
                        <div class="p-1 ">
                            <div class="flex-row justify-content-center align-items-center">
                                <p class=" text-gray-400">{{ $course->category->name }}</p>
                                <p class="text-xl uppercase font-bold mb-4">{{ $course->title }}</p>
                                <hr>
                                <p class="text-sm">{!! $course->description !!}</p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 flex flex-wrap justify-between">
                                    <div class="font-semibold text-lg text-blueGray-700">
                                       <h1 class="text-xl font-bold">Daftar Materi pada kursus ini</h1>
                                    </div>
                                    <a href="{{ route('author_lesson_create', ['course_id' => $course->id]) }}" ><button
                                        class="w-10 h-10 border border-solid text-white bg-emerald-500 p-2 rounded-md hover:bg-emerald-700 m-2"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></button></a>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            @if (session('success'))
                                <x-author_alert bgColor="bg-green-500"> {{ session('success') }}</x-author_alert>
                            @endif
                            <!-- Projects table -->
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Chapter
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Judul
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Deskripsi
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">

                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $number => $lesson)
                                        {{-- @if ($lesson->is_public) --}}
                                            <x-lesson_tile :id="$lesson->id" :chapter="$lesson->chapter" :title="$lesson->title"
                                                :description="$lesson->description"
                                                 />
                                            <x-test>{{ $lesson->id }}</x-test>
                                        {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <x-author_footer>

            </x-author_footer>

        </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
        /* Make dynamic date appear */
        (function() {
            if (document.getElementById("get-current-year")) {
                document.getElementById("get-current-year").innerHTML =
                    new Date().getFullYear();
            }
        })();
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start",
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/c473da0646.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>
        DevLearn | Author
    </title>
</head>

<body class="">

    <div class="w-full h-24 bg-red-400">

    </div>
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

                        @role('member')
                            <a href="{{ route('course.lesson.detail', ['id' => $course->id, 'chapter' => 1]) }}"><button
                                    class="border border-solid border-black text-white bg-teal-500 p-2 rounded-md hover:bg-teal-700 m-2">Belajar
                                    Sekarang</button></a>
                        @endrole

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


    @foreach ($lessons as $lesson)
        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                    acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="{{ route('author_lesson_edit', ['id' => $lesson->id]) }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                detail
            </a>
            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                hapus
            </a>
        </div>
    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>


</body>

</html> --}}
