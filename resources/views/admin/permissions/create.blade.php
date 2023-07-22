<x-admin-layout>
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white mx-auto">
        <div class="p-5">
            <h2 class="text-xl mb-2">Create Permissions</h2>
            <form class="" method="POST" action="{{ route('admin.permissions.store') }}">
                @csrf
                <div class="relative z-0 w-full mb-6 group p-2">
                    <input type="text" name="name" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Permissions
                        Name </label>
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

    </div>


</x-admin-layout>
