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
                        <a href="{{ route('admin.course.lesson', ['id' => $course->id]) }}"><button
                                class="border border-solid border-black text-white bg-teal-500 p-2 rounded-md hover:bg-teal-700 m-2">Belajar
                                Sekarang</button></a>

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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>


</body>

</html>
