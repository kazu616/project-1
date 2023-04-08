<header class="border-b border-[#E0E0E0]">
    <div class="container flex items-center justify-between py-2 text-xs">
        <div class="flex items-center gap-x-[30px]">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-linkedin-in"></i>
            <i class="fa-light fa-envelope"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <div class="flex items-center gap-x-10">
            <a href="?controller=account" class="flex items-center gap-x-2">
                <i class="fa-regular fa-user"></i>
                <p class="uppercase">Account</p>
            </a>
            <div id="search" class="hidden">
                <form action="?controller=productCustomer&idG&mode=search" method="POST">
                    <label for="search-input" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input name="search" id="search-input" class="block border h-7 border-black/50 bg-gray-100 rounded-xl py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:bg-white focus:border-indigo-500 focus:placeholder-gray-400 focus:text-gray-900 sm:text-sm" placeholder="Search" type="search" autocomplete="off">
                    </div>
                </form>
            </div>
            <button id="toggle-search" class="search-button gap-x-2 uppercase">
                <i class="fa-solid fa-magnifying-glass"></i>
                Search
            </button>
            <a href="?controller=cart" class="flex items-center gap-x-2">
                <i class="fa-solid fa-cart-shopping"></i>
                <p class="uppercase">Cart</p>
            </a>
        </div>
    </div>
</header>