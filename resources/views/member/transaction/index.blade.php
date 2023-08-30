@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu="$menu"></x-dashboard-sidebar>
    <div class="relative md:ml-72 bg-blueGray-50">
        <!-- Header -->
        {{-- <x-dashboard-header></x-dashboard-header> --}}
        <div
            class="relative bg-gradient-to-bl from-sky-500 dark:from-indigo-600 via-20% to-blue-700 dark:to-indigo-950  md:pt-10 pb-40 pt-12 ">
            <div class="text-white mt-6 px-auto md:pl-5">
                <h1 class="container text-4xl font-bold">Transaksi Anda</h1>
                <p class="container mt-2 font-thin">
                    Daftar pembelian kelas Anda
                    untuk karir masa depan yang cerah
                </p>
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-32">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">

                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-xl bg-white dark:bg-[#303150]">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div
                                    class="relative w-full px-4 max-w-full flex-grow flex-1 flex flex-wrap justify-between">
                                    <div class="font-semibold text-lg text-blueGray-700">
                                        <h3>Daftar Transaksi</h3>
                                    </div>
                                </div>
                                <div class="flex">
                                    <x-dropdown-button :sorts="$sorts" buttonColor="bg-blue-500 dark:bg-indigo-600" textColor="text-white">
                                        urutkan </x-dropdown-button>
                                </div>
                            </div>
                        </div>
                        <div class="block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            No.
                                        </th>

                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Judul kursus
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Harga kursus
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            Tanggal pembelian
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $number => $transaction)
                                        <tr>
                                            <th class="text-center w-8">
                                                {{ $number + 1 + ((request()->query()['page'] ?? 1) - 1) * 10 }}
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $transaction->courses->title }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                Rp{{ $transaction->courses->price }}
                                            </td>
                                            <td
                                                class=" border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ date_format($transaction->created_at, 'D, j M Y, G:i') }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                <i
                                                    class="fas fa-circle
                                        @if ($transaction->payment_status == 'pending') {{ 'text-amber-400' }}
                                        @elseif ($transaction->payment_status == 'sukses')
                                        {{ 'text-emerald-500' }}
                                        @else
                                        {{ 'text-red-600' }} @endif
                                        mr-2"></i>
                                                {{ $transaction->payment_status }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="flex justify-center py-6">
                                {{ $transactions->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-bottom-nav-bar :menu="$menu"></x-bottom-nav-bar>
@endsection
