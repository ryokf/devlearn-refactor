@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <x-dashboard-header></x-dashboard-header>
        <div class="relative bg-slate-800 md:pt-28 pb-24 pt-12 -z-50">
            <div class=" text-white px-4 md:px-10">
                <h1 class="container text-4xl font-bold">Kursus Anda</h1>
                <p class="container mt-2 font-thin">
                    Upgrade terus ilmu dan pengalaman terbaru kamu di bidang teknologi
                </p>
            </div>
        </div>
        <div class="px-4 md:px-10 -m-14 mx-auto">
            <div class="container mb-12 flex gap-4">
                <x-dropdown-button :sorts="$sorts" buttonColor="bg-white" textColor="text-black">urutkan</x-dropdown-button>
                {{-- <x-dropdown-button :sorts="$categories" buttonColor="bg-white"
                    textColor="text-black">kategori</x-dropdown-button> --}}
                <a href="?status=pass"
                    class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-neutral-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button"> diselesaikan
                </a>
                <a href="?status=ongoing"
                    class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-neutral-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button"> berjalan
                </a>
            </div>
            <div class="container mx-auto flex flex-wrap gap-6">
                @foreach ($courses as $course)
                    <div class="w-40 sm:w-64 md:w-80 mx-auto">
                        <x-course-card :id="$course->id" :title="$course->title" :category="$course->category->name" :price="$course->price"
                            :count="count($course->lessons)" :photo="$course->photo" />
                    </div>
                @endforeach
            </div>
            <div class="max-w-xl mx-auto mt-6">

                {{ $courses->onEachSide(1)->links() }}
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
