@extends('layouts.master')

@section('title', 'Search Results')

@section('content')

    <body class="font-poppins text-[#0E0140] pb-[100px] overflow-x-hidden">
        <div id="page-background" class="absolute h-[863px] w-full top-0 -z-10 overflow-hidden">
            <img src="{{ asset('assets/backgrounds/group-2009.png') }}" class="w-full h-full object-fill" alt="background">
        </div>

        <x-nav />

        <header class="container max-w-[1130px] mx-auto flex items-center justify-between gap-[50px] mt-[70px]">
            <div class="flex flex-col items-center w-full gap-[30px]">
                <h1 class="font-black text-[36px] leading-[50px] text-white text-center">Explore 10,000+<br>Popular Jobs
                </h1>
                <form action="{{ route('front.search') }}" method="GET"
                    class="w-[579px] flex items-center bg-white rounded-full pl-6 h-fit focus-within:ring-2 focus-within:ring-[#FF6B2C] transition-all duration-300">
                    @csrf
                    <div class="flex items-center w-full mr-6 gap-[10px]">
                        <div class="flex shrink-0">
                            <img src="{{ asset('assets/icons/search-normal.svg') }}" alt="icon">
                        </div>
                        <input type="text" id="" name="keyword" autocomplete="keyword"
                            class="appearance-none w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#0E0140] focus:outline-none"
                            placeholder="Find your dream job...">
                    </div>
                    <button type="submit"
                        class="rounded-full py-5 px-[30px] bg-[#FF6B2C] font-semibold text-white text-nowrap hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Explore
                        Now</button>
                </form>
            </div>
        </header>

        <section id="Result" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px] w-fit">
            <h2 class="font-bold text-2xl leading-[36px] text-white">Search Result: {{ ucfirst($keyword) }}</h2>
            <div class="categories-container grid grid-cols-3 gap-[30px]">
                @foreach ($jobs as $job)
                    <x-job-card :job="$job" />
                @endforeach
            </div>
            <div>
                {{ $jobs->appends(['keyword' => request('keyword')])->links('components.pagination') }}
            </div>
        </section>
    </body>
@endsection
