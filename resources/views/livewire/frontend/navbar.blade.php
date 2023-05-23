<div>
    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b text-sm py-2.5 sm:py-4">
        <nav class="max-w-7xl flex basis-full items-center w-full mx-auto px-4 sm:px-6 lg:px-8" aria-label="Global">
            <div class="mr-5 md:mr-8">
                <a class="flex-none text-xl font-semibold" href="{{url('/')}}" aria-label="Brand">Restaurant Recom</a>
            </div>

            <div class="w-full flex items-center justify-end ml-auto sm:justify-between sm:gap-x-3 sm:order-3">
                <div class="hidden sm:block">
                    <label for="icon" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                            <span class="material-symbols-outlined text-red-500">
                                search
                            </span>
                        </div>
                        <input type="text" id="icon" name="icon"
                            class="py-2 px-4 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500"
                            placeholder="Search">
                    </div>
                </div>

                <div class="flex flex-row items-center justify-end gap-2">
                    @auth
                        <div class="hs-dropdown relative inline-flex" data-hs-dropdown-placement="bottom-right">
                            <button id="hs-dropdown-with-header" type="button"
                                class="hs-dropdown-toggle py-2 px-2 inline-flex justify-center items-center gap-1 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                                My Account
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] z-10 bg-white shadow-md rounded-lg p-2"
                                aria-labelledby="hs-dropdown-with-header">
                                <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg">
                                    <p class="text-sm text-gray-500">Signed in as</p>
                                    <p class="text-sm font-medium text-gray-800">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="mt-2 py-2 first:pt-0 last:pb-0">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-red-500 hover:text-white focus:ring-2 focus:ring-red-500"
                                        href="#">
                                        <span class="material-symbols-outlined">
                                            face
                                        </span>
                                        View Profile
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-red-500 hover:text-white focus:ring-2 focus:ring-red-500"
                                        href="#">
                                        <span class="material-symbols-outlined">
                                            comment
                                        </span>
                                        My Reviews
                                    </a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-red-500 hover:text-white focus:ring-2 focus:ring-red-500"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <span class="material-symbols-outlined">
                                                logout
                                            </span>
                                            Logout
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}">
                            <button type="button"
                                class="py-2 px-2 inline-flex justify-center items-center gap-1 rounded-md border border-transparent font-semibold text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm">
                                <span class="material-symbols-outlined">
                                    login
                                </span>
                                Login
                            </button>
                        </a>
                        <a href="{{ route('register') }}">
                            <button type="button"
                                class="py-2 px-2 inline-flex justify-center items-center gap-1 rounded-md bg-red-100 border border-transparent font-semibold text-red-500 hover:text-white hover:bg-red-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-red-500 focus:ring-offset-2 transition-all text-sm">
                                Signup
                                <span class="material-symbols-outlined">
                                    arrow_right_alt
                                </span>
                            </button>
                        </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>
    <!-- Nav -->
    <nav class="sticky -top-px bg-white text-sm font-medium text-black ring-1 ring-gray-900 ring-opacity-5 border-t shadow-sm shadow-gray-100 pt-6 md:pb-6 -mt-px"
        aria-label="Jump links">
        <div
            class="max-w-7xl snap-x w-full flex items-center overflow-x-auto scrollbar-x px-4 sm:px-6 lg:px-8 pb-4 md:pb-0 mx-auto">
            <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last-pr-0">
                <a class="inline-flex items-center gap-x-2 hover:text-red-500" href="#">Restaurants</a>
            </div>
            <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last:pr-0">
                <a class="inline-flex items-center gap-x-2 hover:text-red-500" href="#">Cuisines</a>
            </div>
            <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last:pr-0">
                <a class="inline-flex items-center gap-x-2 hover:text-red-500" href="#">About</a>
            </div>
        </div>
    </nav>
    <!-- End Nav -->
    <!-- ========== END HEADER ========== -->
</div>
