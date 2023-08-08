@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <x-dashboard-header></x-dashboard-header>
        <div class="relative bg-slate-800 md:pt-32 pb-32 pt-12 -z-50">
            <div class="text-3xl font-bold text-white px-4 md:px-10">
                <h1 class="container">Kursus Anda</h1>
                </div>
        </div>
        <div class="px-4 md:px-10 -m-24 mx-auto">
            <div class="container mx-auto flex flex-wrap gap-6">
                @foreach ($courses as $course)
                    <div class="w-40 sm:w-64 md:w-80 mx-auto">
                        <x-course-card :id="$course->courses->id" :title="$course->courses->title" :category="$course->courses->category->name" :price="$course->courses->price"
                            :count="count($course->courses->lessons)" :photo="$course->courses->photo" />
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
