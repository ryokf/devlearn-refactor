@extends('layouts.layout')
@section('body')
    <x-dashboard-sidebar :menu=$menu />



    <div class="relative md:ml-72 bg-blueGray-50">

        <!-- Header -->
        <div class="relative bg-slate-800 md:pt-32 pb-32 pt-12">

        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-36 min-h-screen">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white mx-auto">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Category Course
                            </h3>
                        </div>
                        <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button"
                            class="text-sm bg-primary text-white rounded-md p-2 hover:bg-blue-900">Add Category</button>
                    </div>
                </div>
                {{-- modal add category --}}
                <div id="small-modal" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                    Add Category
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="small-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <form action="{{ route('category.add') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-6">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                            Name</label>
                                        <input type="text" id="name" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>

                                    </div>
                                    <div class="mb-6">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                            Description</label>
                                        <input type="text" id="description" name="description"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>

                                    </div>

                                    <div class="mb-6">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="file_input">Upload file</label>
                                        <input name="photo"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="file_input" type="file">
                                    </div>

                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>



                {{-- End Delete Confirmation Modal --}}
                <div class=" w-full  flex flex-wrap overflow-x-auto">
                    <table class="w-full ">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Category ID
                                </th>
                                <th scope="col"
                                    class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Category Name
                                </th>
                                <th scope="col"
                                    class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Category Description
                                </th>
                                <th scope="col"
                                    class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Photo
                                </th>
                                <th scope="col"
                                    class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="">
                                    <th scope="row"
                                        class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $category->id }}
                                    </th>
                                    <td scope="row"
                                        class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $category->name }}
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $category->description }}
                                    </td>
                                    <th scope="row"
                                        class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <img src="{{ asset(Storage::url($category->photo)) }}" class="w-20 h-20"
                                            alt="">
                                    </th>
                                    <th scope="row"
                                        class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <!-- Button to open the modal -->
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="bg-blue-500 p-2 rounded-md text-white hover:bg-blue-700 mr-1">
                                            Edit
                                        </a>
                                        <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button
                                                class="inline bg-red-500 p-2 rounded-md text-white hover:bg-red-700 mr-1"
                                                type="submit">Delete</button>
                                        </form>

                                    </th>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
