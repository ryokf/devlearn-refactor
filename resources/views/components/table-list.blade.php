<tr>
    <th class="text-center w-8">
        {{ $number }}
    </th>
    <th
        class="max-w-sm border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs p-4 text-left flex items-center">
        {{-- <img src="{{ asset('storage/' . $photo) }}" class="h-12 w-12 bg-white rounded border object-cover" alt="..." /> --}}
        <span class="ml-3 font-bold text-blueGray-600 whitespace-normal">
            {{ $title }}
        </span>
    </th>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $category }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        <i class="fas fa-circle
        @if ($status == 'berjalan')
        {{ 'text-amber-400' }}
        @elseif ($status == 'selesai')
        {{ 'text-emerald-500' }}
        @else
    {{ 'text-red-600' }}
        @endif

        mr-2"></i>
        {{ $status }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $price }}
    </td>
    <td class="text-center border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $member }}
    </td>
    <td class="px-6 align-left  text-xs whitespace-nowrap p-4">
        <div class="inline-flex rounded-md" role="group">
            <div class="bg-emerald-500 rounded-l-lg" title="lihat detail kursus">
                <a href="{{ url('course-show/' . $id) }}"
                    class="flex inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-emerald-500 rounded-l-lg focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <i class="fa-solid fa-scroll" style="color: #fafaf9;"></i>
                </a>
            </div>
            <div class="bg-amber-500" title="edit kursus">
                <a href="{{ url('course-edit/' . $id)}}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-amber-500  focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <i class="fa-solid fa-pen-to-square" style="color: #fafaf9;"></i>
                </a>
            </div>
            <div class="bg-red-600 rounded-r-md" title="hapus kursus">
                <button type="button" type="button" data-modal-target="popup-modal-delete-{{ $id }}"
                    data-modal-toggle="popup-modal-delete-{{ $id }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-red-600 rounded-r-md  focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <i class="fa-solid fa-trash-can" style="color: #fafaf9;"></i>
                </button>
            </div>
        </div>
    </td>
</tr>

{{-- modal hapus --}}
<div id="popup-modal-delete-{{ $id }}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-delete-{{ $id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">anda yakin ingin menghapus kursus
                    <b>{{ $title }}</b>
                </h3>
                <form action="{{ route('course.delete') }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button data-modal-hide="popup-modal-delete-{{ $id }}" type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        iyah
                    </button>
                </form>
                <button data-modal-hide="popup-modal-delete-{{ $id }}" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    batal</button>
            </div>
        </div>
    </div>
</div>
