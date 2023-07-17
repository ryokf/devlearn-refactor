@if (Session::has('message'))
    <div id="banner"
        class="relative isolate flex items-center gap-x-6 overflow-hidden bg-cyan-100 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
        <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
            <p class="text-sm leading-6 text-gray-900">{{ Session::get('message') }}</p>
        </div>
        <div class="flex flex-1 justify-end">
            <button type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
                <span class="sr-only">Dismiss</span>
                <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path
                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                </svg>
            </button>
        </div>
    </div>
@endif

<script>
    // Menambahkan event listener pada tombol silang
    document.querySelector('#banner button').addEventListener('click', function() {
        // Menghilangkan banner
        document.getElementById('banner').style.display = 'none';
    });
</script>
