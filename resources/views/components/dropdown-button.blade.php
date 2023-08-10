<button id="dropdownDefaultButton{{ $slot }}" data-dropdown-toggle="dropdown{{ $slot }}"
class="{{ $textColor }} {{ $buttonColor }} focus:ring-4 focus:outline-none focus:ring-neutral-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
type="button">{{ isset(request()->sort) ? request()->sort : $slot }} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" d="m1 1 4 4 4-4" />
</svg>
</button>
<!-- Dropdown menu -->
<div id="dropdown{{ $slot }}"
class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
<ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
    aria-labelledby="dropdownDefaultButton{{ $slot }}">
    {{-- @foreach ($sorts as $sort)
        <li>
            <a href="?sort={{ $sort }}"
                class="block px-4 py-2 {{ request('sort') == $sort ? 'bg-gray-200' : '' }} hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $sort }}</a>
        </li>
    @endforeach --}}

    @for ($i = 0; $i <= 1 ; $i++)
    <li>
        <a href="?sort={{ $sorts[$i] }}"
            class="block px-4 py-2 {{ request('sort') == $sorts[$i] ? 'bg-gray-200' : '' }} hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $sorts[$i] }}</a>
    </li>
    @endfor
</ul>
</div>
