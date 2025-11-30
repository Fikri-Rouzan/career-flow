@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')

    <body class="font-poppins text-[#0E0140]">
        <main class="min-h-screen flex">
            <div id="Left-background"
                class="fixed top-0 left-0 h-screen w-[640px] flex shrink-0 items-baseline ring-1 ring-[#E8E4F8] overflow-hidden">
                <img src="{{ asset('assets/backgrounds/working-from-home.png') }}"
                    class="background object-cover w-full h-full" alt="background image">
                <div
                    class="testimonial absolute bottom-0 w-[580px] mx-[30px] mt-auto mb-[30px] rounded-[20px] border border-[#E8E4F8] p-5 flex flex-col gap-4 bg-white shadow-[0_8px_30px_0_#0E01400D]">
                    <p class="caption font-semibold leading-8">Career Flow gave me a fresh start after being laid off. I was
                        able to learn new skills, upgrade my portfolio, and then land a remote job with a pretty ideal
                        salary! Awesome.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-[14px]">
                            <div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/photos/photo1.png') }}" class="object-cover w-full h-full"
                                    alt="photo">
                            </div>
                            <div class="h-fit">
                                <p class="font-semibold">Marcus Thorne</p>
                                <p class="text-sm leading-[21px]">Data Analyst</p>
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

            <section id="Signup-form"
                class="pl-[640px] flex flex-col py-[140px] items-center justify-center w-full gap-[70px]">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                    class="max-w-[500px] w-full flex flex-col gap-[30px]">
                    @csrf
                    <a href="{{ route('front.index') }}" class="logo h-[10] flex shrink-0 justify-start mb-10">
                        <img src="{{ asset('assets/logos/logo-black.svg') }}" class="object-contain" alt="logo">
                    </a>
                    <h1 class="font-bold text-[26px] leading-[39px]">Create Account</h1>
                    <div class="flex items-center gap-4">
                        <button type="button" id="Upload-btn"
                            class="w-[100px] h-[100px] flex shrink-0 rounded-full overflow-hidden">
                            <img id="File-thumbnail" src="{{ asset('assets/icons/upload-avatar.svg') }}"
                                class="object-cover w-full h-full" alt="avatar">
                        </button>
                        <div class="h-fit flex flex-col gap-1">
                            <label class="font-semibold" for="File-upload">Add Your Avatar</label>
                            <p class="text-sm leading-[21px]">Use professional photo for career</p>
                            <button type="button" id="Replace-photo-btn"
                                class="font-semibold text-sm leading-[21px] text-[#FF6B2C] hover:underline transition-all duration-300 w-fit hidden">Replace
                                Photo</button>
                        </div>
                        <input type="file" name="avatar" id="File-upload" class="hidden" accept="image/*">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="Name" class="font-semibold">Full Name</label>
                        <div
                            class="flex items-center rounded-full p-[14px_24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/user.svg') }}" alt="icon">
                            </div>
                            <input type="text" name="name" id="Name" autocomplete="name"
                                class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none"
                                placeholder="Type your full name" required>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="Email" class="font-semibold">Email</label>
                        <div
                            class="flex items-center rounded-full p-[14px_24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/sms.svg') }}" alt="icon">
                            </div>
                            <input type="email" name="email" id="Email" autocomplete="email"
                                class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none"
                                placeholder="Type your email" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-[30px]">
                        <div class="flex flex-col gap-2">
                            <label for="Occupation" class="font-semibold">Occupation</label>
                            <div
                                class="flex items-center rounded-full p-[14px_24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{ asset('assets/icons/note-favorite.svg') }}" alt="icon">
                                </div>
                                <input type="text" name="occupation" id="Occupation" autocomplete="occupation"
                                    class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none"
                                    placeholder="Type here..." required>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="Experience" class="font-semibold">Experience</label>
                            <div
                                class="flex items-center rounded-full p-[14px_24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{ asset('assets/icons/chart.svg') }}" alt="icon">
                                </div>
                                <input type="number" min="0" name="experience" id="Experience"
                                    autocomplete="experience"
                                    class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none"
                                    placeholder="Type here..." required>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2" x-data="{ show: false }">
                        <label for="Password" class="font-semibold">Password</label>
                        <div
                            class="flex items-center rounded-full p-[14px_24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/lock.svg') }}" alt="icon">
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password" id="Password"
                                class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none"
                                placeholder="Type your password" required>
                            <button type="button" @click="show = !show"
                                class="w-6 h-6 flex shrink-0 focus:outline-none">
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 text-[#0E0140]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 text-[#0E0140]" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2" x-data="{ show: false }">
                        <label for="Confirm-Password" class="font-semibold">Confirm Password</label>
                        <div
                            class="flex items-center rounded-full p-[14px_24px] gap-[10px] ring-1 ring-[#0E0140] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/lock.svg') }}" alt="icon">
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password_confirmation" id="Confirm-Password"
                                class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none"
                                placeholder="Type your password" required>
                            <button type="button" @click="show = !show"
                                class="w-6 h-6 flex shrink-0 focus:outline-none">
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 text-[#0E0140]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 text-[#0E0140]" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold">Account Type</p>
                        <div class="grid grid-cols-2 gap-[30px]">
                            <label
                                class="relative group bg-white rounded-3xl p-[30px_24px] flex flex-col items-center justify-center gap-5 ring-1 ring-[#0E0140] has-[:checked]:ring-2 has-[:checked]:ring-[#FF6B2C] transition-all duration-300 cursor-pointer">
                                <div class="w-[46px] h-[46px] flex shrink-0">
                                    <img src="{{ asset('assets/icons/briefcase.svg') }}" alt="icon">
                                </div>
                                <p class="font-semibold">As an Employee</p>
                                <img src="{{ asset('assets/icons/tick-circle-orange.svg') }}"
                                    class="absolute top-[10px] right-[10px] w-6 h-6 opacity-0 group-has-[:checked]:opacity-100 transition-all duration-300"
                                    alt="icon">
                                <input type="radio" value="Employee" name="account_type" id="Employee"
                                    class="absolute -z-10 top-1/2 left-1/2" required>
                            </label>
                            <label
                                class="relative group bg-white rounded-3xl p-[30px_24px] flex flex-col items-center justify-center gap-5 ring-1 ring-[#0E0140] has-[:checked]:ring-2 has-[:checked]:ring-[#FF6B2C] transition-all duration-300 cursor-pointer">
                                <div class="w-[46px] h-[46px] flex shrink-0">
                                    <img src="{{ asset('assets/icons/building.svg') }}" alt="icon">
                                </div>
                                <p class="font-semibold">As an Employer</p>
                                <img src="{{ asset('assets/icons/tick-circle-orange.svg') }}"
                                    class="absolute top-[10px] right-[10px] w-6 h-6 opacity-0 group-has-[:checked]:opacity-100 transition-all duration-300"
                                    alt="icon">
                                <input type="radio" value="Employer" name="account_type" id="Employer"
                                    class="absolute -z-10 top-1/2 left-1/2" required>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <button type="submit"
                            class="rounded-full p-[14px_30px] bg-[#FF6B2C] font-semibold text-white text-nowrap hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Sign
                            Up</button>
                        <a href="{{ route('login') }}"
                            class="rounded-full border border-[#0E0140] p-[14px_30px] font-semibold text-[#0E0140] text-center">Sign
                            In to My Account</a>
                    </div>
                </form>
            </section>
        </main>
    </body>
@endsection

@section('scripts')
    <script>
        document.getElementById('Upload-btn').addEventListener('click', function() {
            document.getElementById('File-upload').click();
        });
        document.getElementById('Replace-photo-btn').addEventListener('click', function() {
            document.getElementById('File-upload').click();
        });
        document.getElementById('File-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('File-thumbnail').src = e.target.result;
                    document.getElementById('Replace-photo-btn').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
