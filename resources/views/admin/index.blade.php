<x-admin-layout>
    <div class="">
        <div>
            <!-- Card stats -->
            <div class="flex flex-wrap">
                {{-- @dd($data->coursePercentage) --}}
                <x-statistic_card_ title="jumlah member" value="{{ $Member }}" icon='fa-solid fa-users'
                    iconBgColor="bg-primary" />
                <x-statistic_card_ title="jumlah author" value="{{ $Author }}" icon='fa-solid fa-user'
                    iconBgColor="bg-primary" />
                <x-statistic_card_ title="jumlah course" value="{{ $Course }}" icon='fa-solid fa-book'
                    iconBgColor="bg-primary" />
                <x-statistic_card_ title="jumlah transaksi" value="{{ $Transaction }}"
                    icon='fa-solid fa-money-bill-alt' iconBgColor="bg-primary" />

            </div>
            <div class="flex flex-wrap mt-4">
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

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coursesPopuler as $top)
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
                                            @foreach ($certificates as $top)
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
                                                        {{ $top->status }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
