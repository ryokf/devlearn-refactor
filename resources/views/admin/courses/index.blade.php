<x-admin-layout>
    <article class="p-4">
        <div class="py-2 w-full">
            <div class="flex justify-between p-2">
                <div>
                    <h1 class="text-2xl">Dashboard Courses</h1>
                </div>
            </div>

            <div class="relative overflow-x-auto  shadow-md sm:rounded-lg">
                <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-1">
                                ID Course
                            </th>
                            <th scope="col" class="px-4 py-1">
                                Course Title
                            </th>
                            <th scope="col" class="px-4 py-1 ">
                                Description
                            </th>
                            <th scope="col" class="px-4 py-1">
                                Photo
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $course->id }}
                                </td>
                                <td scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $course->title }}
                                </td>
                                <td scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white w-500">
                                    {{ Str::limit($course->description, 100) }}
                                    <span class="text-gray-600">...</span>
                                </td>
                                <td scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    <img src="{{ $course->photo }}" width="50px" height="50px">
                                </td>
                                <td scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a class="bg-blue-500 p-2 rounded-md hover:bg-blue-600" href="">Detail</a>
                                    <form class="inline" action="{{ route('admin.course.delete', $course->id) }}"
                                        method="POST" onsubmit="return confirm('Are you sure??')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 p-2 rounded-md hover:bg-red-700"
                                            type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</x-admin-layout>
