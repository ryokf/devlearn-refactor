<x-admin-layout>
    <article class="p-4">
        <div class="py-2 w-full">
            <div class="flex justify-between p-2">
                <div>
                    <h1 class="text-2xl">Dashboard Permissions</h1>
                </div>
                <div>
                    <a href="{{ route('admin.permissions.create') }}"
                        class="bg-blue-500 text-white font-medium hover:bg-blue-700 rounded-md p-2">Create
                        Permissions</a>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $permission->name }}
                                </th>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a class="bg-green-500 p-2 rounded-md hover:bg-green-700"
                                        href="{{ route('admin.permissions.edit', $permission->id) }}">Edit</a>
                                    <form class=" inline"
                                        action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                        method="POST" onsubmit="return confirm('Are you sure??')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 p-2 rounded-md hover:bg-red-700"
                                            type="submit">Delete</button>
                                    </form>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </article>

</x-admin-layout>
