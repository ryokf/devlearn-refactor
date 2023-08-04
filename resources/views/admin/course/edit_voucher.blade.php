@extends('layouts.layout')
@section('body')
    <x-dashboard-sidebar :menu=$menu />



    <div class="relative md:ml-72 bg-blueGray-50">

        <!-- Header -->
        <div class="relative bg-slate-800 md:pt-32 pb-32 pt-12">

        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-36 min-h-screen">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white mx-auto">
                <div class="p-5">
                    <h1 class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Edit Voucher</h1>
                    <form action="{{ route('course.voucher.edit', $course->id) }}" method="POST">
                        <div class="mb-6">
                            <label for="courseName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course
                                Name</label>
                            <input type="text" id="disabled-input" aria-label="disabled input" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $course->title }}">
                        </div>
                        @if ($course->voucher !== null && $course->voucher->token !== null)
                            <div class="mb-6">
                                <label for="courseVoucher"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Voucher Code
                                </label>
                                <input type="text" id="text" id="disabled-input" aria-label="disabled input"
                                    disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required value="{{ $course->voucher->token }}">
                            </div>
                        @else
                            <div class="mb-6">
                                <label for="courseVoucher"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Voucher Code
                                </label>
                                <input type="text" id="text" id="disabled-input" aria-label="disabled input"
                                    disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required value="Tidak Punya Voucher">
                            </div>
                        @endif
                        <div class="mb-6">
                            <label for="editVocuher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Edit Voucher</label>

                            @method('put')
                            @csrf
                            <select id="countries" name="voucher_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected>Choose a Token</option>
                                @foreach ($vouchers as $voucher)
                                    <option value="{{ $voucher->id }}">{{ $voucher->token }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
