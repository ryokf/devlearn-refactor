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
                            class="px-3 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            ID Course
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
                    @foreach ($courses as $course)
                        <tr class="">
                            <td scope="row"
                                class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $course->id }}
                            </td>
                            <td scope="row"
                                class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $course->title }}
                            </td>
                            <td scope="row"
                                class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 w-500">
                                {{ Str::limit($course->description, 50) }}
                                <span class="text-gray-600">...</span>
                            </td>
                            <td scope="row"
                                class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <img src="{{ $course->photo }}" width="50px" height="50px">
                            </td>
                            <td scope="row"
                                class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <a href="{{ route('admin.course.detail', $course) }}"
                                    class="bg-teal-500 text-white active:bg-teal-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Detail
                                    Course</a>
                                <form class="inline-block" action="{{ route('admin.course.delete', $course->id) }}"
                                    method="POST" onsubmit="return confirm('Are you sure??')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Delete
                                        Course</button>
                                </form>
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
