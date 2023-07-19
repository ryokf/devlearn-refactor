<x-admin-layout>
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white mx-auto">
        <div class="p-5">
            <form action="{{ route('admin.course.category.update', ['id' => $category->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                        Name</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $category->name }}" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input name="photo"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">
                </div>

                @if ($category->photo)
                    <img src="{{ asset('storage/' . $category->photo) }}" alt="Category Photo"
                        style="max-width: 200px;">
                    <br>
                @endif
                <button type="submit">Update Category</button>
            </form>
        </div>

    </div>
</x-admin-layout>
