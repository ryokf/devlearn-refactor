@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <div class="relative bg-slate-800 mb-10 py-10">
         <x-dashboard-header></x-dashboard-header>

            <div class="text-white mt-10 px-auto md:pl-5">
                <h1 class="container text-4xl font-bold">Kursus Anda</h1>
                <p class="container mt-2 font-thin">
                    Upgrade terus ilmu dan pengalaman terbaru kamu di bidang teknologi
                </p>
            </div>
            <div class="lg:flex md:pl-5 pt-5 items-center">
                <form class="container flex items-center" action="" method="GET">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-2 pr-20 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="cari kursus..." name="search" required>
                    </div>
                    <button type="submit"
                        class="p-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>


                <div class="container flex md:overflow-hidden overflow-x-auto items-center gap-3 my-3 lg:my-0">
                    <x-dropdown-button :sorts="$sorts" buttonColor="bg-white"
                        textColor="text-black">urutkan</x-dropdown-button>
                    {{-- <x-dropdown-button :sorts="$categories" buttonColor="bg-white"
                        textColor="text-black">kategori</x-dropdown-button> --}}
                    <a href="?status=pass"
                        class="{{ request()->status == 'pass' ? 'bg-blue-600 text-white' : 'bg-white text-black' }} focus:ring-4 focus:outline-none focus:ring-neutral-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button"> diselesaikan
                    </a>
                    <a href="?status=ongoing"
                        class="{{ request()->status == 'ongoing' ? 'bg-blue-600 text-white' : 'bg-white text-black' }} focus:ring-4 focus:outline-none focus:ring-neutral-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button"> berjalan
                    </a>
                </div>
       
            </div>
        </div>
        <div class="px-10 mx-auto">
            @if (request()->search != null && count($courses) == 0)
                <h1 class="text-center mx-auto font-semibold text-xl">kursus yang anda cari tidak tersedia</h1>
                <a title="kembali ke daftar kursus" class="block text-center mt-4" href="{{ route('course.index') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            @endif
            @if(request()->search == null && count($courses) == 0)
                <h1 class="text-center mx-auto font-semibold text-xl">anda belum memiliki kursus</h1>
                <a class="block text-center mt-2 text-blue-600 text-lg" href="{{ route('homepage') }}#categories">beli kursus</a>
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                @foreach ($courses as $course)
                        <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price"
                            :count="count($course->lessons)" :photo="$course->photo" />
                @endforeach
            </div>

            <div class="max-w-xl mx-auto mt-6">
                @if (request()->search == null)
                    {{ $courses->onEachSide(1)->links() }}
                @endif
            </div>
            <x-dashboard-footer />
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
