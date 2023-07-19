<!DOCTYPE html>
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
    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>


</body>

</html>
