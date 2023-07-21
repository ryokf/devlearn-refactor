@extends('author.layout')

@section('body')
<div class="relative md:ml-72 bg-blueGray-50">
    <x-author_header></x-author_header>
    <div class="relative bg-primary md:pt-32 pb-32 pt-12 -z-50">

    </div>
    <div class="px-4 md:px-10 -m-24 mx-auto">
        <div class="flex flex-wrap justify-start mb-10">
            @foreach ($courses as $course)

            <div class="max-w-xs m-4 mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div href="#" class=" w-80 h-40">
                    <img class="w-80 h-40 rounded-t-lg " src="{{ $course->courses->photo }}" alt="" />
                </div>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Str::limit($course->courses->title, 30, '...')  }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($course->courses->description, 100, '...')  }}</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Mulai belajar
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>

            @endforeach


        </div>
        <x-author_footer />
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
