<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded"></div>
            <span class="self-center text-2xl font-semibold whitespace-nowrap ">SIMFONIA</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full py-3 md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                <li>
                    <a href="{{ route('dashboard') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Katalog <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('frontend.unit_bisnis.katalog',  ['unit_bisnis_id' => 1])}}" class="block px-4 py-2 hover:bg-gray-100">Ruangan & Gedung </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.unit_bisnis.katalog',  ['unit_bisnis_id' => 2])}}" class="block px-4 py-2 hover:bg-gray-100">Inventaris</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.unit_bisnis.katalog',  ['unit_bisnis_id' => 3])}}" class="block px-4 py-2 hover:bg-gray-100">Alat Tulis & Printing
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.unit_bisnis.katalog',  ['unit_bisnis_id' => 4])}}" class="block px-4 py-2 hover:bg-gray-100">Pengembangan Software
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.unit_bisnis.katalog',  ['unit_bisnis_id' => 5])}}" class="block px-4 py-2 hover:bg-gray-100">Kewirausahaan
                                </a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="{{ route('frontend.unit_bisnis.all-katalog') }}" class="block px-4 py-2 text-sm text-blue-700 hover:bg-gray-100 ">See All</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{route('frontend.bookings.check-purchase')}}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Cek Pemesanan</a>
                </li>
                <li>
                    <a href="{{ route('frontend.calendar') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Kalender</a>
                </li>

            </ul>


        </div>
        <div class="flex flex-row">
            @guest
            <a href="{{ route('register') }}" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Register</a>
            <a href="{{ route('login') }}" type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</a>
            @endguest

            @auth


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endauth
        </div>

    </div>
</nav>