{{-- @dd($data) --}}
@extends('layouts.layout')

@section('body')
<x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <x-dashboard-header></x-dashboard-header>
        <div class="relative bg-slate-800 md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div>
                    <!-- Card stats -->
                    <div class="flex flex-wrap justify-end">
                        <div class="w-full xl:w-6/12 px-4">
                            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                                lanjutkan belajar
                                            </h5>
                                            <span class="font-thin mt-1 block text-blueGray-700">
                                                <span class="font-semibold">{{ $data['lastStudy'][0]->title }}</span> | {{ $data['lastStudy'][1]->chapter }}. {{ $data['lastStudy'][1]->title }}
                                            </span>
                                        </div>
                                        <div class="relative w-auto pl-4 flex-initial">
                                            <div
                                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-slate-800">
                                                <i class="fa-solid fa-hourglass-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('lesson.show', ['chapter' => $data['lastStudy'][1]->chapter, 'id' => $data['lastStudy'][0]->id ]) }}" class="mt-3 block text-blue-600">lanjutkan <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <x-stastitic-card title="jumlah kursus yang dibeli" value="{{ count($data['courseBought']) }}"
                            icon='fa-solid fa-book' iconBgColor="bg-slate-800" percentage="{{ 12.2 }}" arrow="{{ null }}"/>
                        <x-stastitic-card title="jumlah kursus yang diselesaikan" value="{{ count($data['coursePass']) }}"
                            icon='fa-solid fa-scroll' iconBgColor="bg-slate-800" percentage="{{ 12.2 }}" arrow="{{ null }}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full xl:w-3/5 mb-12 xl:mb-0 px-4">
                    <div
                        class="bg-white relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                            <div class=" flex flex-wrap items-center">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h6 class="text-gray-600 uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                        Ringkasan
                                    </h6>
                                    <h2 class="text-xl font-bold ">
                                        Stastitik peforma belajar
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 flex-auto">
                            <!-- Chart -->
                            <div class="relative h-350-px ">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="line-chart" style="display: block; width: 599px; height: 350px;" width="599"
                                    height="350" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-2/5 mb-12 xl:mb-0 px-4">
                    <div
                        class="bg-white relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                            <div class=" flex flex-wrap items-center">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h6 class="text-gray-600 uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                        Ringkasan
                                    </h6>
                                    <h2 class="text-xl font-bold ">
                                        Keahlian Anda
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 flex-auto">
                            <!-- Chart -->
                            <div class="relative h-350-px ">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="income-chart" style="display: block; width: 599px; height: 350px;"
                                    width="599" height="350" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-7/12 mb-12 xl:mb-0 px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4  flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">
                                        Kursus yang anda beli bulan ini
                                    </h3>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <a href="author/course"
                                        class="bg-slate-800 text-white active:bg-neutral-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
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
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Kursus
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            kategori
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            status
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            tanggal pembelian
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['recentBought'] as $course)
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                {{ $course['title'] }}
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $course->category->name }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $course['status'] }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $course['created_at'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-5/12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 flex-grow flex-1">
                                    <h3 class="font-semibold text-base text-blueGray-700">
                                        Kursus yang anda selesaikan bulan ini
                                    </h3>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                    <a href="author/course"
                                        class="bg-slate-800 text-white active:bg-neutral-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
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
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            kursus
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            kategori
                                        </th>
                                        <th
                                            class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            tanggal kursus diselesaikan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['recentFinish'] as $course)
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                {{ $course['title'] }}
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $course->category->name }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
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

(function(){

            /* Chart initialisations */
            /* Line Chart */
            var config = {
                type: "bar",
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
                            label: "pembeli",
                            fill: false,
                            backgroundColor: "#4f46e5",
                            borderColor: "#4f46e5",
                            data: [
                                @foreach ($data['courseBoughtPerMonth'] as $count)
                                    {{ $count . ',' }}
                                @endforeach
                            ],
                        },
                        {
                            label: "lulusan",
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
                        fontColor: "black",
                    },
                    legend: {
                        labels: {
                            fontColor: "black",
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
                                fontColor: "black",
                            },
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: "Month",
                                fontColor: "black",
                            },
                            gridLines: {
                                display: false,
                                borderDash: [2],
                                borderDashOffset: [2],
                                color: "black",
                                zeroLineColor: "rgba(0, 0, 0, 0)",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2],
                            },
                        }, ],
                        yAxes: [{
                            ticks: {
                                fontColor: "black",
                            },
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: "Value",
                                fontColor: "black",
                            },
                            gridLines: {
                                borderDash: [3],
                                borderDashOffset: [3],
                                drawBorder: false,
                                color: "black",
                                zeroLineColor: "black",
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
    </script>
@endsection
