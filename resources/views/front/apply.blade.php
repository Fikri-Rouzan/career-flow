@extends('layouts.master')

@section('title', $companyJob->name . ' - Apply Now')

@section('content')

    <body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
        <div id="page-background" class="absolute h-[533px] w-full top-0 -z-10 overflow-hidden">
            <img src="{{ asset('assets/backgrounds/group-2009.png') }}" class="w-full h-full object-cover lg:object-fill"
                alt="background">
        </div>

        <x-nav />

        <form action="{{ route('front.apply.store', $companyJob->slug) }}" method="POST" enctype="multipart/form-data"
            class="relative max-w-[900px] mx-4 lg:mx-auto flex flex-col rounded-[20px] bg-white border border-[#E8E4F8] p-5 lg:p-[30px] gap-6 lg:gap-10 shadow-[0_8px_30px_0_#0E01400D] mt-20 lg:mt-[130px]">
            @csrf
            <div
                class="absolute -top-[40px] lg:-top-[60px] left-5 lg:left-[50px] w-[80px] h-[80px] lg:w-[120px] lg:h-[120px] p-3 lg:p-5 flex shrink-0 items-center justify-center bg-white rounded-[20px] border border-[#E8E4F8] shadow-[0_8px_30px_0_#0E01400D]">
                <img src="{{ Storage::url($companyJob->company->logo) }}" class="object-contain w-full h-full"
                    alt="logo">
            </div>
            <div id="Title" class="flex flex-col pt-[40px] lg:pt-[60px] gap-[10px]">
                @if ($companyJob->is_open)
                    <p id="HiringBadge"
                        class="rounded-full px-3 py-1 lg:p-[8px_20px] bg-[#7521FF] font-bold text-white text-xs lg:text-base w-fit">
                        WE'RE
                        HIRING!</p>
                @else
                    <p id="ClosedBadge"
                        class="rounded-full px-3 py-1 lg:p-[8px_20px] bg-[#FF2C39] font-bold text-white text-xs lg:text-base w-fit">
                        CLOSED
                    </p>
                @endif

                <h1 class="font-bold text-[26px] lg:text-[32px] leading-[36px] lg:leading-[48px]">{{ $companyJob->name }}
                </h1>
                <p class="text-sm lg:text-base text-gray-500">{{ $companyJob->category->name }} • Posted at
                    {{ $companyJob->created_at->format('d M, Y') }}</p>
            </div>
            <div id="Feature" class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
                <div class="flex items-center gap-2 lg:gap-[6px]">
                    <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                        <img src="{{ asset('assets/icons/note-favorite-orange.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-sm lg:text-lg leading-[27px]">{{ $companyJob->type }}</p>
                </div>
                <div class="flex items-center gap-2 lg:gap-[6px]">
                    <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                        <img src="{{ asset('assets/icons/personalcard-yellow.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-sm lg:text-lg leading-[27px]">{{ $companyJob->skill_level }}</p>
                </div>
                <div class="flex items-center gap-2 lg:gap-[6px]">
                    <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                        <img src="{{ asset('assets/icons/moneys-cyan.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-sm lg:text-lg leading-[27px] text-nowrap">Rp
                        {{ number_format($companyJob->salary, 0, ',', '.') }}/mo</p>
                </div>
                <div class="flex items-center gap-2 lg:gap-[6px]">
                    <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                        <img src="{{ asset('assets/icons/location-purple.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-sm lg:text-lg leading-[27px] truncate">{{ $companyJob->location }}</p>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-500 text-white py-3 w-full px-5 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div id="Cover-Letter-Container" class="flex flex-col gap-4">
                <p class="font-semibold text-xl leading-[30px]">Craft a Compelling Cover Letter</p>
                <div
                    class="flex rounded-[20px] bg-white ring-1 ring-[#0E0140] p-[14px_24px] gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                    <div class="w-6 h-5 flex shrink-0 mt-[2px]">
                        <img src="{{ asset('assets/icons/award.svg') }}" alt="icon">
                    </div>
                    <textarea name="message" id="coverLetter" rows="9"
                        class="appearance-none outline-none w-full font-semibold placeholder:text-[#0E0140] focus:outline-none bg-transparent"
                        placeholder="Highlight your skills and professional experience" required></textarea>
                </div>
            </div>
            <div id="Resume-Container" class="flex flex-col gap-4">
                <p class="font-semibold text-xl leading-[30px]">Complete Your Profile</p>
                <div
                    class="relative flex rounded-[20px] bg-white ring-1 ring-[#0E0140] p-[14px_24px] gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300 cursor-pointer hover:bg-gray-50">
                    <div class="w-6 h-5 flex shrink-0 mt-[2px]">
                        <img src="{{ asset('assets/icons/brifecase-tick.svg') }}" alt="icon">
                    </div>
                    <button type="button" id="fileButton" class="font-semibold w-full text-left outline-none truncate"
                        onclick="document.getElementById('fileInput').click();">Upload your resume</button>
                    <input type="file" name="resume" id="fileInput" class="hidden" accept=".pdf" required></input>
                </div>
            </div>

            <hr class="border-[#E8E4F8]">

            <div id="CTA" class="flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-0">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icons/security-user.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-sm lg:text-base text-gray-700">Your data is encrypted and securely
                        protected by our system</p>
                </div>
                <div class="flex items-center gap-3 w-full lg:w-fit">
                    <button type="submit"
                        class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300 w-full lg:w-fit text-center">Submit
                        My Application</button>
                </div>
            </div>
        </form>
    </body>
@endsection

@section('scripts')
    <script src="{{ asset('js/fileInput.js') }}"></script>
@endsection
