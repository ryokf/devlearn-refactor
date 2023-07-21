<x-admin-layout>
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white mx-auto">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-lg text-blueGray-700">
                        Dashboard User's Course
                    </h3>
                </div>
            </div>
        </div>
        <div class=" w-full overflow-x-auto flex flex-wrap">
            <table class="mx-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col"
                            class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            User ID
                        </th>
                        <th scope="col"
                            class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            User Name
                        </th>
                        <th scope="col"
                            class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Course ID
                        </th>
                        <th scope="col"
                            class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Course Name
                        </th>
                        <th scope="col"
                            class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Payment Status
                        </th>
                        <th scope="col"
                            class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Payment Receipt
                        </th>
                        <th scope="col"
                            class="px-9 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            Update Payment Status
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($UserCourses as $userCourse)
                        <tr class="">
                            <th scope="row"
                                class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $userCourse->user_id }}
                            </th>
                            <td scope="row"
                                class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $userCourse->users->username }}
                            </td>
                            <th scope="row"
                                class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $userCourse->course_id }}
                            </th>
                            <th scope="row"
                                class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $userCourse->courses->title }}
                            </th>
                            <th scope="row"
                                class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                @if ($userCourse->payment_receipt == null)
                                    Belum Ada Pembayaran
                                @else
                                    {{ $userCourse->payment_receipt }}
                                @endif
                            </th>
                            <th scope="row"
                                class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                @if (!$userCourse->payment_status == 'sukses')
                                    Belum Lunas
                                @else
                                    Lunas
                                @endif
                            </th>
                            <th scope="row"
                                class="border-t-0 px-9 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <form action="{{ route('admin.userCourse.update', $userCourse) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit"
                                        class="bg-gray-500 text-white active:bg-gray-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">payment
                                        validation</button>
                                </form>
                            </th>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="flex justify-between items-center py-3 px-6 ">
            <div class="text-sm text-gray-700">
                Showing {{ $UserCourses->firstItem() }} to {{ $UserCourses->lastItem() }} of {{ $UserCourses->total() }}
                results
            </div>
            <div class="flex items-center gap-2">
                <a href="  {{ $UserCourses->url(1) }}"><i class="fas fa-angle-double-left"></i>
                </a>
                <a href="  {{ $UserCourses->previousPageUrl() }}"><i class="fas fa-angle-left"></i>
                </a>


                <a href=" {{ $UserCourses->nextPageUrl() }}"> <i class="fas fa-angle-right"></i> </a>
                <a href="  {{ $UserCourses->url($UserCourses->lastPage()) }}"><i class="fas fa-angle-double-right"></i>
                </a>

            </div>
        </div>

    </div>

</x-admin-layout>
