<nav
    class="top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-16 py-3 navbar-expand-lg bg-white shadow">
    <div class="container px-4 mx-auto flex items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-blueGray-700 text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase"
                href="{{ route('index.display') }}">Devlearn</a><button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button" onclick="toggleNavbar('example-collapse-navbar')">
                <i class="fas fa-bars lg:hidden"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden lg:block"
            id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                <li class="inline-block relative">

                    <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 navbar-popper"
                        id="demo-pages-dropdown">
                        <span
                            class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                            Admin Layout
                        </span>
                        <a href="./pages/admin/dashboard.html"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Dashboard
                        </a>
                        <a href="./pages/admin/settings.html"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Settings
                        </a>
                        <a href="./pages/admin/tables.html"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Tables
                        </a>
                        <a href="./pages/admin/maps.html"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Maps
                        </a>
                        <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
                        <span
                            class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                            Auth Layout
                        </span>
                        <a href="{{ route('login') }}"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Register
                        </a>
                        <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
                        <span
                            class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                            No Layout
                        </span>
                        <a href="./pages/landing.html"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Landing
                        </a>
                        <a href="./pages/profile.html"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Profile
                        </a>
                    </div>
                </li>
                <li class="flex items-center">
                    @auth
                        <a href=@role('member')
                        {{ route('member_dashboard') }}
                    @endrole
                            @role('author')
                        {{ route('author_dashboard') }}
                    @endrole
                            @role('admin')
                        {{ route('admin.index') }}
                    @endrole
                            class="get-started text-white font-bold px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 bg-primary uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            Dashboard {{ request()->user()->roles[0]['name'] }}
                        </a>
                    @endauth
                    @guest

                        <a href={{ route('login') }}
                            class="get-started text-white font-bold px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 bg-primary uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            Login
                        </a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
