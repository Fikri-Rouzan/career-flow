@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
        <div id="page-background" class="absolute h-[1330px] w-full top-0 -z-10 overflow-hidden">
            <img src="{{ asset('assets/backgrounds/group-2009.png') }}" class="w-full h-full object-cover lg:object-fill"
                alt="background">
        </div>

        <x-nav />

        <header
            class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-10 xl:gap-[50px] mt-8 lg:mt-[70px] px-4 xl:px-0">
            <div class="flex flex-col justify-center w-full gap-6 lg:gap-8 xl:gap-10">
                <div class="badge flex items-center rounded-full py-2 pl-4 pr-6 gap-[10px] bg-white w-fit shadow-sm">
                    <div class="flex shrink-0 w-5 h-5 lg:w-6 lg:h-6">
                        <img src="{{ asset('assets/icons/crown-orange.svg') }}" class="w-full h-full" alt="icon">
                    </div>
                    <p class="font-semibold text-xs lg:text-sm leading-[21px] text-[#0C0039]">Empowering 5 Million Careers
                        Worldwide</p>
                </div>
                <div class="flex flex-col gap-2 lg:gap-4">
                    <h1
                        class="font-black text-[36px] lg:text-[50px] xl:text-[60px] leading-[46px] lg:leading-[60px] xl:leading-[70px] text-white">
                        Find
                        Your<br>Dream Job</h1>
                    <p class="text-base lg:text-lg leading-[26px] lg:leading-[34px] text-white/90">The most trusted platform
                        to build your career and find a job you'll love</p>
                </div>
                <form action="{{ route('front.search') }}" method="GET"
                    class="flex items-center bg-white rounded-full p-1.5 lg:pl-6 lg:pr-1.5 lg:py-1.5 h-fit focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300 w-full shadow-lg">
                    @csrf
                    <div class="flex items-center w-full gap-[10px] pl-3 lg:pl-0 lg:mr-6">
                        <div class="flex shrink-0 w-5 h-5 lg:w-6 lg:h-6">
                            <img src="{{ asset('assets/icons/search-normal.svg') }}" class="w-full h-full" alt="icon">
                        </div>
                        <input name="keyword" type="text" autocomplete="keyword"
                            class="appearance-none w-full outline-none font-semibold text-sm lg:text-base placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none min-w-0 bg-transparent"
                            placeholder="Search job...">
                    </div>
                    <button type="submit"
                        class="shrink-0 rounded-full py-3 px-5 lg:py-5 lg:px-[30px] bg-[#FF6B2C] font-semibold text-white text-sm lg:text-base text-nowrap hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">
                        Explore Now
                    </button>
                </form>
            </div>
            <div
                class="flex shrink-0 w-full max-w-[350px] lg:max-w-[450px] xl:max-w-[548px] justify-center lg:justify-end mx-auto lg:mx-0">
                <img src="{{ asset('assets/backgrounds/hero-illustration.png') }}" class="object-contain w-full h-full"
                    alt="banner">
            </div>
        </header>

        <section id="Categories"
            class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-10 lg:mt-[70px] px-4 xl:px-0">
            <h2 class="font-bold text-2xl leading-[36px] text-white">Browse by <br> Job Categories</h2>
            <div class="categories-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-[30px]">
                @foreach ($categories as $category)
                    <a href="{{ route('front.category', $category->slug) }}" class="card block">
                        <div
                            class="flex flex-col rounded-[20px] border border-[#E8E4F8] p-4 lg:p-5 gap-[30px] bg-white shadow-[0_8px_30px_0_#0E01400D] hover:ring-2 hover:ring-[#FF6B2C] transition-all duration-300 h-full">
                            <div class="w-[60px] h-[60px] flex shrink-0">
                                <img src="{{ Storage::url($category->icon) }}" class="object-contain w-full h-full"
                                    alt="icon">
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <div class="flex flex-col">
                                    <p class="font-bold text-lg leading-[27px]">{{ $category->name }}</p>
                                    <p class="font-medium text-sm text-gray-500">{{ $category->jobs->count() }} Jobs</p>
                                </div>
                                <img src="{{ asset('assets/icons/arrow-circle-right.svg') }}" alt="icon"
                                    class="w-8 h-8">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        <section id="Latest" class="flex flex-col gap-[30px] mt-10 lg:mt-[70px]">
            <h2 class="container max-w-[1130px] mx-auto font-bold text-2xl leading-[36px] px-4 xl:px-0">Latest Jobs <br> Get
                Them Now</h2>
            <div class="w-full overflow-x-hidden">
                <div class="main-carousel pl-4 xl:pl-0">
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
