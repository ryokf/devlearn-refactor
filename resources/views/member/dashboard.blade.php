{{-- @dd($data) --}}
@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50 z-50">
        <x-dashboard-header></x-dashboard-header>
        <div class="relative md:pt-32 pb-32 pt-6 md:pt-12 w-full ">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div>
                    <!-- Card stats -->
                    <div class="flex flex-wrap justify-end">
                        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                            <div class="shadow rounded-xl">
                                <div
                                    class="relative flex flex-col min-w-0 break-words icon text-white bg-gradient-to-bl from-orange-300 via-10% to-yellow-400 rounded-xl overflow-hidden mb-6 xl:mb-0 shadow-inner shadow-xs shadow-zinc-200">
                                    <div class="flex-auto ">
                                        <div class="flex flex-wrap p-4">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-blueGray-400 uppercase font-semibold text-xs">
                                                    lanjutkan belajar
                                                </h5>
                                                <span class="font-thin mt-1 block text-blueGray-700">
                                                    @if ($data['lastStudy'] == null)
                                                        <span class="font-medium">anda belum memiliki kursus</span>
                                                    @else
                                                        <span
                                                            class="font-semibold">{{ $data['lastStudy'][0]->title }}</span>
                                                        |
                                                        {{ $data['lastStudy'][1]->chapter }}.
                                                        {{ $data['lastStudy'][1]->title }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-white bg-opacity-40 backdrop-blur-lg ">
                                                    <i class="fa-solid fa-hourglass-half"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-2 px-4 bg-white rounded-b-xl bg-opacity-50 backdrop-blur-lg text-sm">
                                            @if ($data['lastStudy'] == null)
                                                <a href="{{ route('homepage') . '#categories' }}" class="block ">beli kelas
                                                    <i class="fa-solid fa-arrow-right"></i></a>
                                            @else
                                                <a href="{{ route('lesson.show', ['chapter' => $data['lastStudy'][1]->chapter, 'id' => $data['lastStudy'][0]->id]) }}"
                                                    class="block ">lanjutkan <i class="fa-solid fa-arrow-right"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-stastitic-card title="jumlah kursus yang dibeli" value="{{ count($data['courseBought']) }}"
                            icon='fa-solid fa-book'
                            iconBgColor="icon bg-gradient-to-bl from-violet-300 via-10% to-purple-400 shadow-inner shadow-xs shadow-zinc-200"
                            percentage="{{ 12.2 }}" arrow="{{ null }}" />
                        <x-stastitic-card title="jumlah kursus yang diselesaikan" value="{{ count($data['coursePass']) }} "
                            icon='fa-solid fa-scroll'
                            iconBgColor="icon bg-gradient-to-bl from-cyan-300 via-10% to-blue-400 shadow-inner shadow-xs shadow-zinc-200"
                            percentage="{{ 12.2 }}" arrow="{{ null }}" />
                        <x-stastitic-card title="jumlah kursus yang diselesaikan" value="{{ count($data['coursePass']) }}"
                            icon='fa-solid fa-scroll'
                            iconBgColor="icon bg-gradient-to-bl from-emerald-300 via-10% to-green-400 shadow-inner shadow-xs shadow-zinc-200"
                            percentage="{{ 12.2 }}" arrow="{{ null }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full xl:w-3/5 mb-12 xl:mb-0 px-4">
                    <div
                        class="w-full min-h-fit bg-white rounded-xl shadow hover:shadow-lg transition dark:bg-[#303150] p-4 md:p-6 md:py-4 relative">
                        <div class="flex justify-between">
                            <div class="mb-1">
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">Ringkasan</p>
                                <h5 class="leading-none text-xl font-bold dark:text-white pb-2">Peforma
                                    belajar anda</h5>
                            </div>
                            <div
                                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">

                                {{-- <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                </svg> --}}
                            </div>
                        </div>
                        <div id="course-bought"></div>
                        <div
                            class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-end items-center pt-4">
                                <a href="#"
                                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                    Daftar transaksi
                                    <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="w-full xl:w-2/5 mb-12 xl:mb-0 px-4">
                    <div
                        class="relative w-full bg-white rounded-lg shadow hover:shadow-lg transition dark:dark:bg-[#303150] p-4 md:p-6 md:py-4">
                        <div class="flex justify-between ">
                            <div class="">
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">Ringkasan</p>
                                <h5 class="leading-none text-xl font-bold text-gray-900 dark:text-white pb-2">Keahlian anda
                                </h5>
                            </div>

                        </div>

                        <!-- Line Chart -->
                        <div class="pt-2 pb-6" id="donut-chart"></div>
                    </div>
                </div>
                <div class="w-full xl:w-7/12 mb-12 xl:mb-0 px-4 xl:mt-10">
                    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-[#303150] w-full mb-6 shadow rounded-xl">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 flex-grow flex-1">
                                    <h3 class="font-medium">
                                        Kursus yang anda beli bulan ini
                                    </h3>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <a href="author/course"
                                        class="text-center bg-blue-500 text-white active:bg-blue-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button">
                                        lihat semua
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 text-zinc-500 dark:text-zinc-400 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-medium text-left">
                                            Kursus
                                        </th>
                                        <th
                                            class="px-6 text-zinc-500 dark:text-zinc-400 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-medium text-left">
                                            kategori
                                        </th>
                                        <th
                                            class="px-6 text-zinc-500 dark:text-zinc-400 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-medium text-left">
                                            status
                                        </th>
                                        <th
                                            class="px-6 text-zinc-500 dark:text-zinc-400 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-medium text-left">
                                            tanggal pembelian
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['recentBought'] as $course)
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-left font-semibold">
                                                {{ $course['title'] }}
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-zinc-500 dark:text-zinc-400 whitespace-nowrap p-4">
                                                {{ $course->category->name }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-zinc-500 dark:text-zinc-400 whitespace-nowrap p-4">
                                                {{ $course['status'] }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-zinc-500 dark:text-zinc-400 whitespace-nowrap p-4">
                                                {{ $course['created_at'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-5/12 px-4 xl:mt-10">
                    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-[#303150] w-full mb-6 shadow-lg rounded-xl">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 flex-grow flex-1">
                                    <h3 class="font-medium">
                                        Kursus diselesaikan bulan ini
                                    </h3>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <a href="author/course"
                                        class="text-center bg-blue-500 text-white active:bg-blue-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button">
                                        lihat semua
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead class="thead-light">
                                    <tr>
                                        <th
                                            class="px-6  text-zinc-500 dark:text-zinc-400 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            kursus
                                        </th>
                                        <th
                                            class="px-6  text-zinc-500 dark:text-zinc-400 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            kategori
                                        </th>
                                        <th
                                            class="text-center px-6  text-zinc-500 dark:text-zinc-400 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            tanggal kursus diselesaikan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['recentFinish'] as $course)
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm font-medium whitespace-nowrap p-4 text-left">
                                                {{ $course['title'] }}
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-zinc-500 dark:text-zinc-400 whitespace-nowrap p-4">
                                                {{ $course->category->name }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-zinc-500 dark:text-zinc-400 whitespace-nowrap p-4">
                                                {{ $course['created_at'] }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <x-dashboard-footer />
        </div>
    </div>


    <x-bottom-nav-bar :menu="$menu"></x-bottom-nav-bar>


    <div data-dial-init class="fixed right-6 bottom-20 md:bottom-6 group z-[99999]">
        <div id="speed-dial-menu-default" class="flex flex-col items-center hidden mb-4 space-y-2">
            <button type="button" data-tooltip-target="tooltip-share" data-tooltip-placement="left"
                class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.419 10.581a3.564 3.564 0 0 0-2.574 1.1l-4.756-2.49a3.54 3.54 0 0 0 .072-.71 3.55 3.55 0 0 0-.043-.428L11.67 6.1a3.56 3.56 0 1 0-.831-2.265c.006.143.02.286.043.428L6.33 6.218a3.573 3.573 0 1 0-.175 4.743l4.756 2.491a3.58 3.58 0 1 0 3.508-2.871Z" />
                </svg>
                <span class="sr-only">Share</span>
            </button>
            <div id="tooltip-share" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Share
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button type="button" data-tooltip-target="tooltip-print" data-tooltip-placement="left"
                class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z" />
                    <path
                        d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z" />
                </svg>
                <span class="sr-only">Print</span>
            </button>
            <div id="tooltip-print" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Print
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button type="button" data-tooltip-target="tooltip-download" data-tooltip-placement="left"
                class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                    <path
                        d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Download</span>
            </button>
            <div id="tooltip-download" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Download
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button type="button" data-tooltip-target="tooltip-copy" data-tooltip-placement="left"
                class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 dark:hover:text-white shadow-sm dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 18 20">
                    <path
                        d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z" />
                    <path
                        d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z" />
                </svg>
                <span class="sr-only">Copy</span>
            </button>
            <div id="tooltip-copy" role="tooltip"
                class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Copy
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <button type="button" data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default"
            aria-expanded="false"
            class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 1v16M1 9h16" />
            </svg>
            <span class="sr-only">Open actions menu</span>
        </button>
    </div>



    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script> --}}
    {{-- <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // ApexCharts options and config
        window.addEventListener("load", function() {
            let options = {
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 3,
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [{
                    name: "pembelian",
                    data: [
                        @foreach ($data['courseBoughtPerMonth'] as $count)
                            {{ $count . ',' }}
                        @endforeach
                    ],
                    color: "#38bdf8",
                }, {
                    name: "kelulusan",
                    data: [
                        @foreach ($data['coursePassPerMonth'] as $count)
                            {{ $count . ',' }}
                        @endforeach
                    ],
                    color: "#fb923c",
                }],
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "Mei",
                        "Jun",
                        "Jul",
                        "Agu",
                        "Sep",
                        "Okt",
                        "Nov",
                        "Des"
                    ],
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },
                        formatter: function(value) {
                            return value + " "
                        },
                    },
                },
            }

            if (document.getElementById("course-bought") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("course-bought"), options);
                chart.render();
            }
        });
    </script>

    <script>
        // ApexCharts options and config
        window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: [
                        @foreach ($data['passPerCategory'] as $count)
                            {{ count($count) }},
                        @endforeach
                    ],
                    colors: [
                        "#fb7185",
                        "#e879f9",
                        "#818cf8",
                        "#67e8f9",
                        "#34d399",
                        "#fdba74",
                    ],
                    chart: {
                        height: 320,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: 20,
                                    },
                                    total: {
                                        showAlways: true,
                                        show: true,
                                        label: "Kursus anda beli",
                                        fontFamily: "Inter, sans-serif",

                                    },
                                    value: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: -20,

                                    },
                                },
                                size: "80%",
                            },
                        },
                    },
                    grid: {
                        padding: {
                            top: -2,
                        },
                    },
                    labels: [
                        @foreach ($data['categories'] as $count)
                            "{{ $count->name }}",
                        @endforeach
                    ],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + " kursus"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + " kursus"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
                chart.render();

                // Get all the checkboxes by their class name
                const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

                // Function to handle the checkbox change event
                function handleCheckboxChange(event, chart) {
                    const checkbox = event.target;
                    if (checkbox.checked) {
                        switch (checkbox.value) {
                            case 'desktop':
                                chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                                break;
                            case 'tablet':
                                chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                                break;
                            case 'mobile':
                                chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                                break;
                            default:
                                chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                        }

                    } else {
                        chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
                    }
                }

                // Attach the event listener to each checkbox
                checkboxes.forEach((checkbox) => {
                    checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
                });
            }
        });
    </script>

    {{-- <script type="text/javascript">
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
        // import gradient from 'chartjs-plugin-gradient';

        (function() {
            const gradient = window['chartjs-plugin-gradient'];
            Chart.register(gradient);
            /* Chart initialisations */
            /* Line Chart */
            var config = {
                type: "line",
                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "Mei",
                        "Jun",
                        "Jul",
                        "Agu",
                        "Sep",
                        "Okt",
                        "Nov",
                        "Des"
                    ],
                    datasets: [{
                            gradient: {
                                backgroundColor: {
                                    axis: 'y',
                                    colors: {
                                        0: 'red',
                                        50: 'yellow',
                                        100: 'green'
                                    }
                                },
                                borderColor: {
                                    axis: 'x',
                                    colors: {
                                        0: 'red',
                                        1: 'purple',
                                        2: 'blue',
                                        3: 'green'
                                    }
                                }
                            },
                            label: "pembelian",
                            fill: true,
                            // backgroundColor: "#9333ea",
                            // borderColor: "#9333ea",
                            data: [
                                @foreach ($data['courseBoughtPerMonth'] as $count)
                                    {{ $count . ',' }}
                                @endforeach
                            ],
                        },
                        {
                            label: "kelulusan",
                            fill: false,
                            backgroundColor: "#db2777",
                            borderColor: "#db2777",
                            data: [
                                @foreach ($data['coursePassPerMonth'] as $count)
                                    {{ $count . ',' }}
                                @endforeach
                            ],
                        },
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: false,
                        text: "Sales Charts",
                        fontColor: "lightgray",
                    },
                    legend: {
                        labels: {
                            fontColor: "lightgray",
                        },
                        align: "end",
                        position: "bottom",
                    },
                    tooltips: {
                        mode: "index",
                        intersect: false,
                    },
                    hover: {
                        mode: "nearest",
                        intersect: true,
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontColor: "lightgray",
                            },
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: "Month",
                                fontColor: "lightgray",
                            },
                            gridLines: {
                                display: false,
                                borderDash: [2],
                                borderDashOffset: [2],
                                color: "lightgray",
                                zeroLineColor: "rgba(0, 0, 0, 0)",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2],
                            },
                        }, ],
                        yAxes: [{
                            ticks: {
                                fontColor: "lightgray",
                            },
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: "Value",
                                fontColor: "lightgray",
                            },
                            gridLines: {
                                borderDash: [3],
                                borderDashOffset: [3],
                                drawBorder: false,
                                color: "lightgray",
                                zeroLineColor: "lightgray",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2],
                            },
                        }, ],
                    },
                },
            };
            var ctx = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(ctx, config);

            var config = {
                type: "radar",
                data: {
                    labels: [
                        @foreach ($data['categories'] as $count)
                            "{{ $count->name }}",
                        @endforeach
                    ],
                    datasets: [{
                        label: "keahlian",
                        fill: false,
                        backgroundColor: "#10b981",
                        borderColor: "#10b981",
                        borderWidth: 1,
                        data: [
                            @foreach ($data['passPerCategory'] as $count)
                                {{ count($count) }},
                            @endforeach
                        ],
                        // tension: 0.,
                        // stepped: 'middle'
                    }, ],
                },
                options: {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.yLabel;
                            }
                        }
                    }
                }

            };
            var ctx = document.getElementById("income-chart").getContext("2d");
            window.myLine = new Chart(ctx, config);
        })

        ();
    </script> --}}
@endsection
