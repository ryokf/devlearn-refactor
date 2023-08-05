@extends('layouts.layout')

@section('body')
<x-dashboard-sidebar :menu="$menu"></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <x-dashboard-header></x-dashboard-header>
        <!-- Header -->
        <div class="relative bg-slate-800 md:pt-32 pb-32">

        </div>
        <div class="px-4 md:px-10 mx-auto w-full md:-my-36 -m-20">
            <div class="w-full px-4 ">
                <div
                    class=" relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <h6 class="text-blueGray-700 text-xl font-bold">
                                materi baru
                            </h6>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0 bg-gray-100">
                        <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="flex p-4 my-4 text-sm text-red-50 rounded-lg bg-red-600 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Danger</span>
                                    <div>
                                        <span class="font-medium">Harap Perhatikan:</span>
                                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            @csrf
                            <input type="hidden" name="course_id" value="{{ request()->get('course_id') }}">

                            <div class="relative mt-10">
                                <label for="floating_outlined"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Judul Bab
                                </label>
                                <input type="text" id="floating_outlined" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                    placeholder="contoh : tutorial javascript untuk pemula" />
                            </div>

                            <div class="relative mt-6">
                                <label for="floating_outlined"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    chapter
                                </label>
                                <input type="text" id="floating_outlined" name="chapter"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                    placeholder="contoh : 1" />
                            </div>

                            <div class="relative mt-6">
                                <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                                lesson</label>
                                <textarea id="message" rows="4" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-slate-500 focus:border-slate-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                placeholder="contoh : tutorial yang cocok bagi kalian yang belum pernah menggunakan javascript dan ingin mempelajarinya"></textarea>
                            </div>

                            <div class="relative mt-6">
                                <label for="desc-trix"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">isi materi</label>
                                <input id="desc-trix" type="hidden" name="text_content">
                                <trix-editor class="bg-gray-50" input="desc-trix"></trix-editor>
                            </div>
                            <div class="w-full flex justify-end">
                            <button type="submit"
                                    class="self-end w-32 mt-10 focus:outline-none text-white border border-slate-800 bg-slate-800 hover:bg-neutral-800 focus:ring-4 focus:ring-neutral-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-neutral-700 dark:hover:bg-slate-700 dark:focus:ring-slate-800">kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                placement: "bottom-start"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
@endsection