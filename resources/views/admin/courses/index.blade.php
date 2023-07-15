<x-admin-layout>

    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-lg text-blueGray-700">
                        Courses Table
                    </h3>
                </div>
            </div>
        </div>

        <div class="block w-full overflow-x-auto">
            <table class=" items-center w-full bg-transparent border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col"
                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            ID Course
                        </th>
                        <th scope="col"
                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Course Title
                        </th>
                        <th scope="col"
                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100 ">
                            Description
                        </th>
                        <th scope="col"
                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Photo
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr class="">
                            <td scope="row"
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $course->id }}
                            </td>
                            <td scope="row"
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $course->title }}
                            </td>
                            <td scope="row"
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 w-500">
                                {{ Str::limit($course->description, 100) }}
                                <span class="text-gray-600">...</span>
                            </td>
                            <td scope="row"
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <img src="{{ $course->photo }}" width="50px" height="50px">
                            </td>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                                <a href="#pablo" class="text-blueGray-500 block py-1 px-3"
                                    onclick="openDropdown(event,'table-light-1-dropdown')">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                                    id="table-light-1-dropdown">
                                    <a href="#pablo"
                                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Detail
                                        Course</a>
                                    <form class="" action="{{ route('admin.course.delete', $course->id) }}"
                                        method="POST" onsubmit="return confirm('Are you sure??')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Delete
                                            Course</button>
                                    </form>


                                </div>
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
                    <a href="  {{ $courses->url($courses->lastPage()) }}"><i class="fas fa-angle-double-right"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
