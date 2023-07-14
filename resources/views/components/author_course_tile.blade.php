<tr>
    <th class="text-center w-8">
        {{ $number }}
    </th>
    <th
        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
        <img src="{{ $photo }}" class="h-12 w-12 bg-white rounded border" alt="..." />
        <span class="ml-3 font-bold text-blueGray-600">
            {{ $title }}
        </span>
    </th>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $category }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        <i class="fas fa-circle text-orange-500 mr-2"></i>
        {{ $status }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $price }}
    </td>
    <td class="text-center border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $member }}
    </td>
    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
        <a href="#pablo" class="text-blueGray-500 block py-1 px-3"
            onclick="openDropdown(event,'table-light-1-dropdown')">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            id="table-light-1-dropdown">
            <a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Action</a><a
                href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Another
                action</a><a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something
                else here</a>
            <div class="h-0 my-2 border border-solid border-blueGray-100">
            </div>
            <a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Seprated
                link</a>
        </div>
    </td>
</tr>
