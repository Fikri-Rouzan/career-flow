<nav class="container max-w-[1130px] mx-auto flex items-center justify-between pt-8 lg:pt-10 px-4 xl:px-0"
    x-data="{ mobileMenuOpen: false }">
    <a href="{{ route('front.index') }}" class="flex shrink-0 z-30">
        <img src="{{ asset('assets/logos/logo.svg') }}" alt="Logo">
    </a>

    <div class="hidden lg:flex items-center gap-10">
        <ul class="flex items-center gap-10">
            <li>
                <a href="{{ route('front.index') }}"
                    class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] {{ request()->routeIs('front.index') ? 'text-[#FF6B2C] font-semibold' : 'text-white font-medium' }}">Home</a>
            </li>
            <li>
                <a href="#"
                    class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Features</a>
            </li>
            <li>
                <a href="#"
                    class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Benefits</a>
            </li>
            <li>
                <a href="#"
                    class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">Stories</a>
            </li>
            <li>
                <a href="#"
                    class="transition-all duration-300 hover:font-semibold hover:text-[#FF6B2C] font-medium text-white">About</a>
            </li>
        </ul>

        @guest
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}"
                    class="rounded-full border border-white p-[14px_24px] font-semibold text-white">Sign In</a>
                <a href="{{ route('register') }}"
                    class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Sign
                    up</a>
            </div>
        @endguest

        @auth
            <div class="flex items-center gap-4">
                <p class="username font-medium text-white">Hi, {{ Auth::user()->name }}</p>
                <div class="w-[52px] h-[52px] flex shrink-0 rounded-full overflow-hidden">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/logos/icon.png') }}"
                            class="object-cover w-full h-full" alt="photo">
                    </a>
                </div>
            </div>
        @endauth
    </div>

    <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden z-30 flex items-center justify-center p-2">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>

    <div x-show="mobileMenuOpen" style="display: none;" class="fixed inset-0 z-50 flex justify-end">
        <div @click="mobileMenuOpen = false" x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm">
        </div>
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="relative w-full max-w-[300px] h-full bg-white shadow-xl flex flex-col p-6 overflow-y-auto">
            <button @click="mobileMenuOpen = false" class="self-end mb-8 mt-2 p-2">
                <svg class="w-8 h-8 text-[#0E0140]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <ul class="flex flex-col gap-6 text-[#0E0140]">
                <li>
                    <a href="{{ route('front.index') }}"
                        class="text-lg font-medium {{ request()->routeIs('front.index') ? 'text-[#FF6B2C] font-bold' : '' }}">Home</a>
                </li>
                <li>
                    <a href="#" class="text-lg font-medium hover:text-[#FF6B2C]">Features</a>
                </li>
                <li>
                    <a href="#" class="text-lg font-medium hover:text-[#FF6B2C]">Benefits</a>
                </li>
                <li>
                    <a href="#" class="text-lg font-medium hover:text-[#FF6B2C]">Stories</a>
                </li>
                <li>
                    <a href="#" class="text-lg font-medium hover:text-[#FF6B2C]">About</a>
                </li>
            </ul>

            <hr class="my-6 border-gray-200">

            @guest
                <div class="flex flex-col gap-3">
                    <a href="{{ route('login') }}"
                        class="text-center w-full rounded-full border border-[#0E0140] py-3 font-semibold text-[#0E0140]">Sign
                        In</a>
                    <a href="{{ route('register') }}"
                        class="text-center w-full rounded-full py-3 bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66]">Sign
                        Up</a>
                </div>
            @endguest

            @auth
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/logos/icon.png') }}"
                                class="object-cover w-full h-full" alt="photo">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-bold text-[#0E0140]">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500">Welcome back!</p>
                        </div>
                    </div>
                    <a href="{{ route('dashboard') }}"
                        class="text-center w-full rounded-full py-3 bg-[#0E0140] font-semibold text-white">My Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-center text-red-500 font-semibold py-2">Log Out</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
