<x-admin-layout>
    <article class="p-4">
        <div class="py-2 w-full">
            <div class="flex justify-between p-2">
                <div>
                    <h1 class="text-2xl">Dashboard User Course</h1>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                User ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User Name
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Course ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Course Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Payment Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Payment Receipt
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Update Payment Status
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($UserCourses as $userCourse)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"x
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $userCourse->user_id }}
                                </th>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $userCourse->users->username }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $userCourse->course_id }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $userCourse->courses->title }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($userCourse->payment_receipt == null)
                                        Belum Ada Pembayaran
                                    @else
                                        {{ $userCourse->payment_receipt }}
                                    @endif
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($userCourse->payment_status == false)
                                        Belum Lunas
                                    @else
                                        Lunas
                                    @endif
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <form action="{{ route('admin.userCourse.update', $userCourse) }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit"
                                            class="bg-black p-2 text-white rounded-md hover:bg-gray-800">Update
                                            pembayaran</button>
                                    </form>
                                </th>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </article>
</x-admin-layout>
