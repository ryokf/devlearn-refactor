<nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="">Dashboard {{ request()->user()->roles[0]['name'] }}</a>
        <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">
            <div class="relative flex w-full flex-wrap items-stretch text-white font-bold">
                selamat datang, {{ auth()->user()->username }}</div>
        </form>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="cursor-pointer text-blueGray-500 block" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                    <span
                        class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                            alt="..." class="w-12 h-12 rounded-full align-middle shadow-lg border border-white"
                            src="  {{ asset(auth()->user()->photo) }}"></span>
                </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="user-dropdown">
                <span
                    class="font-bold text-sm py-2 px-4 block w-full whitespace-nowrap bg-transparent text-blueGray-700">{{ auth()->user()->username }}
                </span>
                <span
                    class="text-sm pb-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-400">{{ auth()->user()->email }}
                </span>
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a href="/profile"
                    class="text-sm text-center px-4 py-2 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-gray-100">profile
                </a>
                <span data-modal-target="popup-modal-logout" data-modal-toggle="popup-modal-logout"
                    class="cursor-pointer text-center text-red-500 text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700 hover:bg-red-100">logout
                </span>
            </div>
        </ul>
    </div>
</nav>


<div id="popup-modal-logout" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal-logout">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">

                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">anda yakin ingin melakukan logout?</h3>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" data-modal-hide="popup-modal-logout" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        iyah
                    </button>
                    <button data-modal-hide="popup-modal-logout" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
