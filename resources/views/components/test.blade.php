<div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
    id="table-light-1-dropdown">
    {{ $slot }}
    <button data-modal-target="popup-modal-detail-{{ $slot }}"
        data-modal-toggle="popup-modal-detail-{{ $slot }}"
        class="text-left text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Lihat
        detail</button>
    <button data-modal-target="popup-modal-draft-{{ $slot }}"
        data-modal-toggle="popup-modal-draft-{{ $slot }}"
        class="text-left text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Simpan
        ke draft
    </button>
    <div class="h-0 my-2 border border-solid border-blueGray-100">
    </div>
    <button data-modal-target="popup-modal-delete-{{ $slot }}"
        data-modal-toggle="popup-modal-delete-{{ $slot }}"
        class="text-left text-red-600 text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Hapus
        {{ $slot }}</button>
</div>
