@extends('layouts.layout')
@section('body')
    <x-dashboard-sidebar :menu=$menu />
    <div class="relative md:ml-72 bg-blueGray-50">

        <!-- Header -->
        <div class="relative pt-12 pb-32 bg-slate-800 md:pt-32">

        </div>
        <div class="w-full min-h-screen px-4 mx-auto md:px-10 -m-36">
            <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg">
                <div class="px-4 py-3 mb-0 border-0 rounded-t">
                    <div class="flex flex-wrap items-center">
                        <div class="relative flex flex-row justify-between w-full max-w-full px-6">
                            <h3 class="text-lg font-semibold text-blueGray-700">
                                Courses Table
                            </h3>
                            <button data-modal-target="medium-modal" data-modal-toggle="medium-modal" type="button"
                                class="p-1 px-3 text-sm font-semibold text-white bg-orange-500 rounded-md hover:bg-orange-600">List
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
                                    class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
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
                                <table class="items-center w-full bg-transparent border-collapse ">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                ID Voucher
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                Token
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vouchers as $voucher)
                                            <tr class="">
                                                <td scope="row"
                                                    class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                    {{ $voucher->id }}
                                                </td>

                                                <td scope="row"
                                                    class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                    {{ $voucher->token }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('voucher.delete', $voucher->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-red-500 rounded outline-none active:bg-red-600 hover:bg-red-600 focus:outline-none"
                                                            type="submit">Delete</button>

                                                    </form>


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
                    <table class="items-center w-full bg-transparent border-collapse ">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    ID Course
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Creator
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Course Title
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100 ">
                                    Description
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Photo
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses->items() as $course)
                                <tr class="">
                                    <td
                                        class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{ $course->id }}
                                    </td>
                                    <td
                                        class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{ $course->author->username }}
                                    </td>
                                    <td
                                        class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        {{ $course->title }}
                                    </td>
                                    <td
                                        class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap w-500">
                                        {!! Str::limit($course->description, 50) !!}
                                        <span class="text-gray-600">...</span>
                                    </td>
                                    <td
                                        class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                        <img alt="{{ $course->title }}" src="{{ asset('storage/' . $course->photo) }}"
                                            width="50px" height="50px">
                                    </td>
                                    <td
                                        class="p-4 px-3 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">

                                        {{-- Buka Detail Course --}}
                                        <a href="{{ route('lesson.show', ['id' => $course->id, 'chapter' => 1]) }}"
                                            class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-teal-500 rounded outline-none active:bg-teal-600 hover:bg-teal-600 focus:outline-none">
                                            <i class="fas fa-info-circle"></i></a>

                                        {{-- <a href="{{ route('course.detail', $course) }}"
                                            class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-blue-500 rounded outline-none active:bg-teal-600 hover:bg-teal-600 focus:outline-none">
                                            <i class="fas fa-book "></i></a> --}}
                                        {{-- Edit Voucher --}}
                                        <a type="button" href="{{ route('course.voucher.edit', $course->id) }}"
                                            class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-green-500 rounded outline-none active:bg-green-600 hover:bg-green-600 focus:outline-none">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex items-center justify-between px-6 py-3">
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
