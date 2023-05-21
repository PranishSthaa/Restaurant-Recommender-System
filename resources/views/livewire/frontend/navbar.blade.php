<div class="sticky top-0 z-50">

    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Item 1</a></li>
                    <li tabindex="0">
                        <a class="justify-between">
                            Parent
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                        </a>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </li>
                    <li><a>Item 3</a></li>
                </ul>
            </div>
            <a class="normal-case text-xl">Restaurant Recommender</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <div class="form-control">
                <div class="input-group">
                    <input type="text" placeholder="Search…" class="input input-bordered" />
                    <button class="btn btn-square">
                        <div class="material-symbols-outlined">
                            search
                        </div>
                    </button>
                </div>
            </div>
            {{-- <ul class="menu menu-horizontal px-1">
                <li><a>Item 1</a></li>
                <li tabindex="0">
                    <a>
                        Parent
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </li>
                <li><a>Item 3</a></li>
            </ul> --}}
        </div>
        <div class="navbar-end">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline btn-primary btn-sm gap-2">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline btn-primary p-2 gap-2">
                    <span class="material-symbols-outlined">login</span>
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn gap-2 btn-secondary p-2 ml-2">
                    <span class="material-symbols-outlined">
                        person_add
                    </span>
                    Signup
                </a>
            @endauth
        </div>
    </div>
    <div class="p-2 bg-neutral text-center">
        <a class="hover:text-primary" href="#">Restaurants</a>
        <a class="hover:text-primary ml-4" href="#">Cuisines</a>
        <a class="hover:text-primary ml-4" href="#">My Reviews</a>
        <a class="hover:text-primary ml-4" href="#">About</a>
    </div>
</div>
