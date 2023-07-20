{{-- Modal for Delete Confirmation --}}

@props(['text', 'url'])
<div id="delete-modal" tabindex="-1"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Confirm Deletion
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="delete-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-gray-800 dark:text-white">
                    Are you sure you want to delete this {{ $text }}?
                </p>
                <div class="flex justify-end space-x-4">
                    <button type="button"
                        class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"
                        id="delete-confirm-button">Delete</button>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Delete Confirmation Modal --}}
<form id="delete-form" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<input id="id_delete" type="text" value="{{ $url }}" hidden />
<script>
    function openDeleteModal(id) {
        // Set the action URL for the delete form

        const deleteForm = document.getElementById('delete-form');
        const url = document.getElementById('id_delete').value;
        const deleteUrl = url + `/${id}`;
        // {{ url('admin/course/category') }}/${id}
        // const deleteUrl = `{{ url('admin/course/category') }}/${id}`;
        deleteForm.setAttribute('action', deleteUrl);

        // Show the delete modal
        const deleteModal = document.getElementById('delete-modal');
        deleteModal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        // Hide the delete modal
        const deleteModal = document.getElementById('delete-modal');
        deleteModal.classList.add('hidden');
    }

    function closeModalOutsideClick(event) {
        if (event.target === event.currentTarget) {
            closeDeleteModal();
        }
    }
    // Add event listener to the delete confirmation button
    const deleteConfirmButton = document.getElementById('delete-confirm-button');
    deleteConfirmButton.addEventListener('click', function() {
        const deleteForm = document.getElementById('delete-form');
        deleteForm.submit();
    });

    // Add event listener to hide the delete modal when canceled
    const deleteCancelButton = document.querySelector('[data-modal-hide="delete-modal"]');
    deleteCancelButton.addEventListener('click', closeDeleteModal);

    const deleteModal = document.getElementById('delete-modal');
    deleteModal.addEventListener('click', closeModalOutsideClick);
</script>
