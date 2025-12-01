@extends('layouts.master')

@section('title', 'Sign In')

@section('content')

    <body class="font-poppins text-[#0E0140]">
        <main class="min-h-dvh">
            <div id="left-side"
                class="hidden lg:block fixed top-0 left-0 h-dvh lg:w-[460px] xl:w-[640px] outline outline-1 outline-[#E8E4F8] overflow-hidden transition-all duration-300">
                <img src="{{ asset('assets/backgrounds/smiley-woman.png') }}" class="size-full object-cover"
                    alt="background image" />
                <div
                    class="absolute bottom-0 flex p-5 flex-col gap-4 max-w-[590px] mx-[30px] mb-[30px] rounded-[20px] outline outline-1 outline-[#E8E4F8] bg-white shadow-[0_8px_30px_0_#0E01400D]">
                    <p class="text-base leading-[32px] font-semibold">
                        Thanks to Career Flow, I can work from home comfortably without dealing with traffic jams. All the
                        job listings are safe and free from the scams that are so common worldwide these days.
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-[14px]">
                            <div class="flex shrink-0 size-[60px] rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photos/photo2.png') }}" class="object-cover w-full h-full"
                                    alt="profile picture" />
                            </div>
                            <div>
                                <p class="text-base font-semibold">Sophie Mueller</p>
                                <p class="text-sm leading-[21px]">AI Engineer</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-[2px]">
                            @foreach (range(1, 5) as $i)
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{ asset('assets/icons/star.svg') }}" alt="star">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <section id="right-side"
                class="w-full h-dvh flex flex-col items-center justify-center px-4 lg:pl-[480px] xl:pl-[640px] py-10 lg:py-[140px] transition-all duration-300">
                <a href="{{ route('front.index') }}"
                    class="flex shrink-0 justify-start w-full max-w-[500px] h-[10] mb-10 lg:mb-[70px]">
                    <img src="{{ asset('assets/logos/logo-black.svg') }}" class="object-contain" alt="logo" />
                </a>
                <form id="form-signin" action="{{ route('login') }}" method="POST"
                    class="w-full max-w-[500px] flex flex-col gap-[30px]">
                    @csrf
                    <h1 class="text-[26px] leading-[39px] font-bold">Sign In</h1>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-base font-semibold">Email</label>
                        <div
                            class="flex items-center rounded-full py-[14px] px-[24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                            <div class="flex shrink-0 size-6">
                                <img src="{{ asset('assets/icons/sms.svg') }}" alt="email icon" />
                            </div>
                            <input type="email" name="email" id="email"
                                class="w-full focus:outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140]"
                                placeholder="Type your email" required autocomplete="email" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-2" x-data="{ show: false }">
                        <label for="password" class="text-base font-semibold">Password</label>
                        <div
                            class="flex items-center rounded-full py-[14px] px-[24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                            <div class="flex shrink-0 size-6">
                                <img src="{{ asset('assets/icons/lock.svg') }}" alt="password icon" />
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password" id="password"
                                class="w-full focus:outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140]"
                                placeholder="Type your password" required />
                            <button type="button" @click="show = !show" class="flex shrink-0 size-6 focus:outline-none">
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#0E0140]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#0E0140]"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <button type="submit"
                            class="flex items-center justify-center py-[14px] px-[30px] bg-[#FF6B2C] font-semibold text-white rounded-full hover:shadow-[0px_10px_20px_0px_#FF6B2C66] transition-all duration-300">
                            Sign In
                        </button>
                        <a href="{{ route('register') }}"
                            class="flex items-center justify-center py-[14px] px-[30px] font-semibold text-[#0E0140] outline outline-1 outline-[#0E0140] rounded-full">Create
                            New Account</a>
                    </div>
                </form>
            </section>
        </main>
    </body>
@endsection
