@extends('layouts.master')

@section('title', $companyJob->name . ' - ' . $companyJob->company->name)

@section('content')

    <body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
        <div id="page-background" class="absolute h-[533px] w-full top-0 -z-10 overflow-hidden">
            <img src="{{ asset('assets/backgrounds/group-2009.png') }}" class="w-full h-full object-cover lg:object-fill"
                alt="background">
        </div>

        <x-nav />

        <article id="Details"
            class="relative z-10 max-w-[900px] mx-4 lg:mx-auto flex flex-col rounded-[20px] bg-white border border-[#E8E4F8] p-0 lg:p-[30px] gap-6 lg:gap-10 shadow-[0_8px_30px_0_#0E01400D] mt-10 lg:mt-[70px] overflow-hidden">
            <div id="Cover" class="w-full relative h-[200px] lg:h-auto bg-[#D9D9D9] lg:rounded-[20px]">
                <div class="w-full h-full lg:aspect-[840/300] overflow-hidden lg:rounded-[20px]">
                    <img src="{{ Storage::url($companyJob->thumbnail) }}" class="object-cover w-full h-full"
                        alt="cover image">
                </div>
                <div class="absolute transform translate-y-1/2 bottom-0 right-5 hidden lg:block z-30">
                    @if ($companyJob->is_open)
                        <p id="HiringBadge" class="rounded-full p-[8px_20px] bg-[#7521FF] font-bold text-white w-fit">WE'RE
                            HIRING!</p>
                    @else
                        <p id="ClosedBadge" class="rounded-full p-[8px_20px] bg-[#FF2C39] font-bold text-white w-fit">CLOSED
                        </p>
                    @endif
                </div>
            </div>
            <div class="w-full flex flex-col px-5 pb-5 lg:px-0 lg:pb-0 relative">
                <div
                    class="absolute -top-[40px] lg:-top-[60px] left-5 lg:left-0 w-[80px] h-[80px] lg:w-[120px] lg:h-[120px] p-3 lg:p-5 flex shrink-0 items-center justify-center bg-white rounded-[20px] border border-[#E8E4F8] shadow-[0_8px_30px_0_#0E01400D]">
                    <img src="{{ Storage::url($companyJob->company->logo) }}" class="object-contain w-full h-full"
                        alt="logo">
                </div>
                <div id="Title" class="flex flex-col mt-12 lg:mt-[70px] gap-2 lg:gap-[10px]">
                    <div class="lg:hidden mb-2">
                        @if ($companyJob->is_open)
                            <span class="rounded-full px-3 py-1 bg-[#7521FF] font-bold text-white text-xs">WE'RE
                                HIRING!</span>
                        @else
                            <span class="rounded-full px-3 py-1 bg-[#FF2C39] font-bold text-white text-xs">CLOSED</span>
                        @endif
                    </div>
                    <h1 class="font-bold text-[26px] lg:text-[32px] leading-[34px] lg:leading-[48px]">
                        {{ $companyJob->name }}</h1>
                    <p class="text-sm lg:text-base text-gray-500">{{ $companyJob->category->name }} • Posted at
                        {{ $companyJob->created_at->format('d M, Y') }}</p>
                </div>
                <div id="Feature" class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6 mt-6">
                    <div class="flex items-center gap-2 lg:gap-[6px]">
                        <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                            <img src="{{ asset('assets/icons/note-favorite-orange.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-sm lg:text-lg leading-[24px] lg:leading-[27px]">{{ $companyJob->type }}
                        </p>
                    </div>
                    <div class="flex items-center gap-2 lg:gap-[6px]">
                        <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                            <img src="{{ asset('assets/icons/personalcard-yellow.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-sm lg:text-lg leading-[24px] lg:leading-[27px]">
                            {{ $companyJob->skill_level }}
                        </p>
                    </div>
                    <div class="flex items-center gap-2 lg:gap-[6px]">
                        <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                            <img src="{{ asset('assets/icons/moneys-cyan.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-sm lg:text-lg leading-[24px] lg:leading-[27px] text-nowrap">Rp
                            {{ number_format($companyJob->salary, 0, ',', '.') }}/mo</p>
                    </div>
                    <div class="flex items-center gap-2 lg:gap-[6px]">
                        <div class="flex shrink-0 w-8 h-8 lg:w-[38px] lg:h-[38px]">
                            <img src="{{ asset('assets/icons/location-purple.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-sm lg:text-lg leading-[24px] lg:leading-[27px] truncate">
                            {{ $companyJob->location }}</p>
                    </div>
                </div>
                <div id="Overview" class="flex flex-col gap-[10px] mt-6 lg:mt-10">
                    <h2 class="font-semibold text-xl leading-[30px]">Overview</h2>
                    <p class="text-base lg:text-lg leading-[30px] lg:leading-[34px] text-gray-700">{{ $companyJob->about }}
                    </p>
                </div>
                <div id="Responsibilities" class="flex flex-col gap-[10px] mt-6">
                    <h2 class="font-semibold text-xl leading-[30px]">Responsibilities</h2>
                    <div class="flex flex-col gap-4 lg:gap-5">
                        @foreach ($companyJob->responsibilities as $responsibility)
                            <div class="flex items-start gap-2">
                                <div class="flex shrink-0 w-5 h-5 mt-1">
                                    <img src="{{ asset('assets/icons/tick-circle.svg') }}" class="w-full h-full"
                                        alt="tick icon">
                                </div>
                                <p class="text-base lg:text-lg leading-[26px] lg:leading-[28px]">
                                    {{ $responsibility->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="Qualifications" class="flex flex-col gap-[10px] mt-6">
                    <h2 class="font-semibold text-xl leading-[30px]">Qualifications</h2>
                    <div class="flex flex-col gap-4 lg:gap-5">
                        @foreach ($companyJob->qualifications as $qualification)
                            <div class="flex items-start gap-2">
                                <div class="flex shrink-0 w-5 h-5 mt-1">
                                    <img src="{{ asset('assets/icons/tick-circle.svg') }}" class="w-full h-full"
                                        alt="tick icon">
                                </div>
                                <p class="text-base lg:text-lg leading-[26px] lg:leading-[28px]">{{ $qualification->name }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="Company" class="flex flex-col gap-[10px] mt-6">
                    <h2 class="font-semibold text-xl leading-[30px]">Company</h2>
                    <div class="flex flex-col gap-5">
                        <div class="flex items-center gap-5">
                            <div class="company-logo w-[60px] lg:w-[70px] flex shrink-0">
                                <img src="{{ Storage::url($companyJob->company->logo) }}" class="object-contain"
                                    alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <div class="CompanyName font-semibold flex items-center gap-[2px]">
                                    <p class="font-semibold text-lg">{{ $companyJob->company->name }}</p>
                                    <div class="w-5 h-5 flex shrink-0">
                                        <img src="{{ asset('assets/icons/verify.svg') }}" alt="verified">
                                    </div>
                                </div>
                                <p class="text-sm leading-[21px] text-gray-500">{{ $companyJob->company->jobs->count() }}
                                    Jobs
                                </p>
                            </div>
                        </div>
                        <p class="text-base lg:text-lg leading-[28px] lg:leading-[28px] text-gray-700">
                            {{ $companyJob->company->about }}</p>
                    </div>
                </div>

                <hr class="border-[#E8E4F8] my-6 lg:my-10">

                <div id="CTA" class="flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-0">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/icons/security-user.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-sm lg:text-base text-gray-700">Your data is encrypted and securely
                            protected by our system</p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-fit">
                        <a href="#"
                            class="rounded-full border border-[#0E0140] p-[14px_24px] font-semibold text-[#0E0140] text-center w-full lg:w-fit">Bookmark</a>
                        <a href="{{ route('front.apply', $companyJob->slug) }}"
                            class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300 text-center w-full lg:w-fit">Apply
                            Now</a>
                    </div>
                </div>
            </div>
        </article>

        <section id="Latest" class="flex flex-col gap-[30px] mt-10 lg:mt-[70px]">
            <h2 class="container max-w-[1130px] mx-auto font-bold text-2xl leading-[36px] px-4 xl:px-0">Other Jobs You
                <br> Might Interested
            </h2>
            <div class="w-full overflow-x-hidden">
                <div class="main-carousel pl-4 xl:pl-0 pr-4 xl:pr-0">
                    @foreach ($jobs as $job)
                        <x-job-card :job="$job" />
                    @endforeach
                </div>
            </div>
        </section>
    </body>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script>
        $('.main-carousel').flickity({
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            wrapAround: false,
        });
    </script>
@endsection
