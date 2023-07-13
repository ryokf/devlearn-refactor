<x-admin-layout>
    <article class="p-4">
        <div class="py-2 w-full">
            <div class="p-2">
                <h2 class="text-2xl font-semibold">Edit Roles</h2>
                <form class="" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="relative z-0 w-full mb-6 group p-2">
                        <input type="text" name="name" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="{{ $role->name }}" />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">roles
                            Name </label>
                        @error('name')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                        <button class="bg-blue-500 p-2 mt-6 rounded-md hover:bg-blue-700 text-white"
                            type="submit">Edit</button>
                    </div>

                </form>
            </div>
            <div class="mt-6 p-2">
                <h2 class="text-2xl font-semibold">Role Permissions</h2>

                <div>
                    @if ($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                            <form class=" inline"
                                action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                method="POST" onsubmit="return confirm('Are you sure??')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 p-2 rounded-md hover:bg-red-700 text-white"
                                    type="submit">{{ $role_permission->name }}</button>
                            </form>
                        @endforeach
                    @else
                    @endif
                </div>
            </div>
            <form class="" method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                @csrf

                <div class="relative z-0 w-full mb-6 group p-2">
                    <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 ">Permission</label>
                    <select id="permission" name="permission"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <span class="text-red-600">
                            {{ $message }}
                        </span>
                    @enderror
                    <button class="bg-blue-500 p-2 mt-6 rounded-md hover:bg-blue-700 text-white"
                        type="submit">Assign</button>
                </div>

            </form>

        </div>
    </article>

</x-admin-layout>
