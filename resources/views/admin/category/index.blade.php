@extends('layouts.layout')
@section('body')
    <x-dashboard-sidebar :menu=$menu />



    <div class="relative md:ml-72 bg-blueGray-50">

        <!-- Header -->
        <div class="relative pt-12 pb-32 bg-slate-800 md:pt-32">

        </div>
        <div class="w-full min-h-screen px-4 mx-auto md:px-10 -m-36">
            <div class="relative flex flex-col w-full min-w-0 mx-auto mb-6 break-words bg-white rounded shadow-lg">
                <div class="px-4 py-3 mb-0 border-0 rounded-t">
                    <div class="flex flex-wrap items-center">
                        <div class="relative flex-1 flex-grow w-full max-w-full px-4">
                            <h3 class="text-lg font-semibold text-blueGray-700">
                                Category Course
                            </h3>
                        </div>
                        <button data-modal-target="small-modal" data-modal-toggle="small-modal" type="button"
                            class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-indigo-500 rounded outline-none active:bg-indigo-600 focus:outline-none">Add
                            Category</button>
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
                                    class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
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
                <div class="flex flex-wrap w-full overflow-x-auto ">
                    <table class="w-full ">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid px-9 whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Category ID
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid px-9 whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Category Name
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid px-9 whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Category Description
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid px-9 whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Photo
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid px-9 whitespace-nowrap bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="">
                                    <th scope="row"
                                        class="p-4 text-xs align-middle border-t-0 border-l-0 border-r-0 px-9 whitespace-nowrap">
                                        {{ $category->id }}
                                    </th>
                                    <td scope="row"
                                        class="p-4 text-xs align-middle border-t-0 border-l-0 border-r-0 px-9 whitespace-nowrap">
                                        {{ $category->name }}
                                    </td>
                                    <td scope="row"
                                        class="p-4 text-xs align-middle border-t-0 border-l-0 border-r-0 px-9 whitespace-nowrap">
                                        {{ $category->description }}
                                    </td>
                                    <th scope="row"
                                        class="p-4 text-xs align-middle border-t-0 border-l-0 border-r-0 px-9 whitespace-nowrap">
                                        <img src="{{ asset(Storage::url($category->photo)) }}" class="w-20 h-20"
                                            alt="">
                                    </th>
                                    <th scope="row"
                                        class="p-4 text-xs align-middle border-t-0 border-l-0 border-r-0 px-9 whitespace-nowrap">
                                        <!-- Button to open the modal -->
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-green-500 rounded outline-none active:bg-green-600 focus:outline-none">
                                            Edit
                                        </a>
                                        <form class="mt-2" action="{{ route('category.delete', $category->id) }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button
                                                class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-red-500 rounded outline-none active:bg-red-600 focus:outline-none"
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
