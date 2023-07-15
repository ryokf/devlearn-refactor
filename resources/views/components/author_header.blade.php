<nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="./index.html">Dashboard</a>
        <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">
            <div class="relative flex w-full flex-wrap items-stretch text-white font-bold">
                selamat datang, {{ auth()->user()->username }}</div>
        </form>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                    <span
                        class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                            alt="..."
                            class="w-12 h-12 rounded-full align-middle shadow-lg border border-white"
                            src="{{ auth()->user()->photo }}"></span>
                </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="user-dropdown">
                <a href="#pablo"
                    class="font-bold text-sm py-2 px-4 block w-full whitespace-nowrap bg-transparent text-blueGray-700">{{ auth()->user()->username }}
                </a>
                <a href="#pablo"
                    class="text-sm pb-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-400">{{ auth()->user()->email }}
                </a>
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a href="#pablo"
                    class="text-sm text-center pb-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent ">profile
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    {{-- @method('delete') --}}
                    <button type="submit"
                        class="text-red-500 text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">logout
                    </button>
                </form>
            </div>
        </ul>
    </div>
</nav>
