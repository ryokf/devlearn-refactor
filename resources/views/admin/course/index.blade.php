@extends('layouts.layout')
@section('body')
    <x-dashboard-sidebar :menu=$menu />
    <div class="relative md:ml-72 bg-blueGray-50">

        <!-- Header -->
        <div class="relative bg-slate-800 md:pt-32 pb-32 pt-12">

        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-36 min-h-screen">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-6 max-w-full flex flex-row justify-between">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Courses Table
                            </h3>
                            <button data-modal-target="medium-modal" data-modal-toggle="medium-modal" type="button"
                                class="bg-orange-500 p-1 rounded-md text-sm px-3 text-white font-semibold hover:bg-orange-600">List
                                Voucher</button>
                        </div>
                    </div>
                </div>
                {{-- modal list voucher --}}
                <div id="medium-modal" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-lg max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                    List Voucher
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="medium-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-5 space-y-6 ">
                                <table class=" items-center w-full bg-transparent border-collapse">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                ID Voucher
                                            </th>
                                            <th scope="col"
                                                class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                Token
                                            </th>
                                            <th scope="col"
                                                class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vouchers as $voucher)
                                            <tr class="">
                                                <td scope="row"
                                                    class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $voucher->id }}
                                                </td>

                                                <td scope="row"
                                                    class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $voucher->token }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('voucher.delete', $voucher->id) }}"></form>
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="bg-red-500 text-white active:bg-red-600 hover:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                        type="submit">Delete</button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <p class="font-semibold">Add Voucher</p>
                                <form method="post" action="{{ route('voucher.store') }}">
                                    @csrf
                                    <div class="mb-6">
                                        <label for="voucherToken"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Voucher Token</label>
                                        <input type="voucherToken" id="voucherToken" name="token"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- end modal --}}
                <div class="block w-full overflow-x-auto">
                    <table class=" items-center w-full bg-transparent border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    ID Course
                                </th>
                                <th scope="col"
                                    class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Creator
                                </th>
                                <th scope="col"
                                    class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Course Title
                                </th>
                                <th scope="col"
                                    class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100 ">
                                    Description
                                </th>
                                <th scope="col"
                                    class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Photo
                                </th>
                                <th scope="col"
                                    class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses->items() as $course)
                                <tr class="">
                                    <td scope="row"
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $course->id }}
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $course->auhtor->username }}
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $course->title }}
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 w-500">
                                        {!! Str::limit($course->description, 50) !!}
                                        <span class="text-gray-600">...</span>
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <img src="{{ asset('storage/' . $course->photo) }}" width="50px" height="50px">
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        {{-- Buka Lessons --}}
                                        <a href="{{ route('course.detail', $course) }}"
                                            class="bg-teal-500 text-white active:bg-teal-600 hover:bg-teal-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                            <i class="fas fa-info-circle"></i></a>
                                        {{-- Edit Voucher --}}
                                        <a type="button" href="{{ route('course.voucher.edit', $course->id) }}"
                                            class="bg-green-500 text-white active:bg-green-600 hover:bg-green-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-between items-center py-3 px-6">
                        <div class="text-sm text-gray-700">
                            Showing {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of
                            {{ $courses->total() }}
                            results
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="  {{ $courses->url(1) }}"><i class="fas fa-angle-double-left"></i>
                            </a>
                            <a href="  {{ $courses->previousPageUrl() }}"><i class="fas fa-angle-left"></i>
                            </a>

                            <a href=" {{ $courses->nextPageUrl() }}"> <i class="fas fa-angle-right"></i> </a>
                            <a href="  {{ $courses->url($courses->lastPage()) }}"><i
                                    class="fas fa-angle-double-right"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
