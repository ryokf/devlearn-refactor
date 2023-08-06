<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/c473da0646.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>
        DevLearn
    </title>
</head>

<body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <nav
            class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-80 z-10 py-4 px-6">
            <div
                class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
                <button
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                    <i class="fas fa-bars"></i>
                </button>
                <p class="font-semibold uppercase">{{ $course->title }}</p>
                <hr class="mt-5">
                <ul class="md:hidden items-center flex flex-wrap list-none">
                </ul>
                <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
                    id="example-collapse-sidebar">
                    <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                        <div class="flex flex-wrap">
                            <div class="w-6/12">
                                <p class="font-semibold uppercase">{{ $course->title }}</p>
                            </div>
                            <div class="w-6/12 flex justify-end">
                                <button type="button"
                                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                    onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Heading -->
                    <h6
                        class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                    </h6>
                    <!-- Navigation -->
                    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                        @foreach ($lessons as $lesson)
                            <li class="items-center">
                                <a href="{{ route('lesson.index', ['id' => $course->id, 'chapter' => $lesson->chapter]) }}"
                                    class="w-11/12 text-xs uppercase py-3 font-bold block duration-100
                                       {{ request()->routeIs('lesson.index') && request('id') == $course->id && request('chapter') == $lesson->chapter ? 'bg-slate-800 text-slate-100 px-2 rounded-xl ml-1' : 'text-blueGray-700 hover:text-blueGray-500 hover:ml-2' }}">
                                    {{ $lesson->chapter }}.{{ $lesson->title }}

                                </a>
                                <hr class="mb-1">
                                @foreach ($lesson->userLesson as $item)
                                    @if ($item->status)
                                        1
                                    @else
                                        2
                                    @endif
                                @endforeach
                            </li>
                        @endforeach
                    </ul>
                    <ul>
                        <li>


                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="relative md:ml-80 md:px-12">
            @foreach ($lesson_detail as $item)
                <div class="px-4 md:px-10 mx-auto w-full  mb-8">
                    <p class="text-xl font-semibold bg-white p-4">{{ $item->chapter }} . {{ $item->title }}</p>
                    <div class="p-8 flex flex-col md:flex-row md:space-x-8 justify-center items-center">
                        {{-- <img src="{{ $item->media_content }}" alt="{{ $item->title }}"
                            class="w-32 h-32 md:w-80 md:h-64 object-cover rounded-lg shadow-md"> --}}
                        {{-- <video controls>
                            <source src="{{ asset('/storage/media_content/' . $item->media_content) }}"
                                type="video/webm" />
                            Browsermu tidak mendukung tag ini, upgrade donk!
                        </video> --}}
                    </div>

                    <div class="p-8">
                        <div class="mt-2 leading-relaxed">{!! $item->text_content !!}</div>
                    </div>
                </div>
            @endforeach
            <!-- Next button -->
            <div class="px-4 md:px-10 mx-auto w-full mb-8 flex justify-end">
                @if ($nextChapter)
                    <a href="{{ route('lesson.index', ['id' => $course->id, 'chapter' => $nextChapter]) }}"
                        class="bg-slate-800 hover:bg-blue-900 text-white font-bold py-2 px-10 rounded">
                        Next Chapter
                    </a>
                @endif
                @if ($lastChapter)
                    Sudah Selesai
                @endif
            </div>

            {{-- <x-author_footer class="" /> --}}
        </div>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script>
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
                placement: "bottom-start"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>


</html>
