{{-- @dd($data) --}}

@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu />

    <div class="relative md:ml-72 bg-blueGray-50">
        <x-dashboard-header />
        <div class="relative bg-slate-800 md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full">
                {{-- <div>
                    <!-- Card stats -->
                    <div class="flex flex-wrap">
                        <x-stastitic-card title="jumlah kursus" value="{{ count($data['course']) }}" icon='fa-solid fa-book'
                            iconBgColor="bg-slate-800" percentage="{{ $data['coursePercentage'][0] }}"
                            arrow="{{ $data['coursePercentage'][1] }}" />
                        <x-stastitic-card title="jumlah materi" value="{{ $data['lesson_count'] }}"
                            icon='fa-solid fa-scroll' iconBgColor="bg-slate-800"
                            percentage="{{ $data['lessonPercentage'][0] }}" arrow="{{ $data['lessonPercentage'][1] }}" />
                        <x-stastitic-card title="jumlah transaksi" value="{{ $data['member_count'] }}"
                            icon='fa-solid fa-users-rectangle' iconBgColor="bg-slate-800"
                            percentage="{{ $data['transactionPercentage'][0] }}"
                            arrow="{{ $data['transactionPercentage'][1] }}" />
                        <x-stastitic-card title="pemasukan bulan ini" value="Rp{{ $data['income'] }}"
                            icon='fa-solid fa-rupiah-sign' iconBgColor="bg-slate-800"
                            percentage="{{ $data['incomePercentage'][0] }}" arrow="{{ $data['incomePercentage'][1] }}" />
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full mb-12 xl:mb-0 px-4">
                    {{-- <div
                        class="bg-white relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                            <div class=" flex flex-wrap items-center">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h6 class="text-gray-600 uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                        Ringkasan
                                    </h6>
                                    <h2 class="text-xl font-bold ">
                                        Stastitik pemasukan tahun {{ date('Y') }}
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
                    </div> --}}
                    <div class="w-full mb-12 xl:mb-0">
                        <div
                            class="bg-white relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                            <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                                <div class=" flex flex-wrap items-center">
                                    <div class="relative w-full max-w-full flex-grow flex-1">
                                        <h6 class="text-gray-600 uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                            Ringkasan
                                        </h6>
                                        <h2 class="text-xl font-bold ">
                                            Stastitik pembelian kursus
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
                                    <canvas id="line-chart" style="display: block; width: 599px; height: 350px;"
                                        width="599" height="350" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="flex flex-wrap mt-4">
                    <div class="w-full mb-12">
                        <div class="flex flex-wrap mt-4">
                            <div class="w-full xl:w-7/12 mb-12 xl:mb-0 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                                        <div class="flex flex-wrap items-center">
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                                <h3 class="font-semibold text-base text-blueGray-700">
                                                    Kursus dengan pembeli terbanyak bulan ini
                                                </h3>
                                            </div>
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                                <a href="author/course"
                                                    class="bg-primary text-white active:bg-neutral-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
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
                                                        jumlah anggota
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['course_top_bought'] as $top)
                                                    <tr>
                                                        <th
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                            {{ $top->title }}
                                                        </th>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                            {{ $top->category->name }}
                                                        </td>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                            {{ $top->status }}
                                                        </td>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                            {{ count($top->userCourse) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full xl:w-5/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                                        <div class="flex flex-wrap items-center">
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                                <h3 class="font-semibold text-base text-blueGray-700">
                                                    kursus dengan lulusan terbanyak bulan ini
                                                </h3>
                                            </div>
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                                <a href="/author/course"
                                                    class="bg-primary text-white active:bg-neutral-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
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
                                                        jumlah anggota
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['course_top_pass'] as $top)
                                                    <tr>
                                                        <th
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                            {{ $top->title }}
                                                        </th>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                            {{ $top->category->name }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ count($top->userCourse) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-12 xl:mb-0 px-4">
                                <div
                                    class="invisible bg-white relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                                    <div class="p-4 flex-auto ">
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
                                            <canvas id="line-chart" style="display: block; width: 599px; height: 1px;"
                                                width="599" height="350" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <x-dashboard-footer />
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
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


            (function() {
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
                                    @foreach ($data['buyer_count'] as $count)
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
                                    @foreach ($data['graduate_count'] as $count)
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
                            label: "pemasukan",
                            fill: false,
                            backgroundColor: "#10b981",
                            borderColor: "#10b981",
                            borderWidth: 5,
                            data: [
                                @foreach ($data['income_per_month'] as $count)
                                    {{ $count . ',' }}
                                @endforeach
                            ],
                            tension: 0.2,
                        }, ],
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
                                    callback: function(value, index, values) {
                                        return 'Rp' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                            ".");
                                    }
                                },
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: "Value",
                                    fontColor: "black",
                                },
                                gridLines: {
                                    borderDash: [3],
                                    borderDashOffset: [2],
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
                var ctx = document.getElementById("income-chart").getContext("2d");
                window.myLine = new Chart(ctx, config);


            })();
        </script> --}}
    @endsection
