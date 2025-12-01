@props(['job'])

<div class="w-[300px] mr-6 xl:first:ml-[calc((100%-1130px)/2)] shrink-0 py-4">
    <div
        class="flex flex-col rounded-[20px] border border-[#E8E4F8] p-5 gap-5 bg-white shadow-[0_8px_30px_0_#0E01400D] hover:ring-2 hover:ring-[#FF6B2C] transition-all duration-300">
        <div class="company-info flex items-center gap-3">
            <div class="w-[70px] flex shrink-0 overflow-hidden">
                <img src="{{ Storage::url($job->company->logo) }}" class="object-contain w-full h-full" alt="logo">
            </div>
            <div class="flex flex-col">
                <p class="font-semibold">{{ $job->company->name }}</p>
                <p class="text-sm leading-[21px]">Posted at {{ $job->created_at->format('d M, Y') }}
                </p>
            </div>
        </div>

        <hr class="border-[#E8E4F8]">
        <p class="job-title font-bold text-lg leading-[27px] h-[54px] flex shrink-0 line-clamp-2">
            {{ $job->name }}</p>

        <div class="job-info flex flex-col gap-[14px]">
            <div class="flex items-center gap-[6px]">
                <div class="flex shrink-0 w-6 h-6">
                    <img src="{{ asset('assets/icons/note-favorite-orange.svg') }}" alt="icon">
                </div>
                <p class="font-medium">{{ $job->type }}</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div class="flex shrink-0 w-6 h-6">
                    <img src="{{ asset('assets/icons/moneys-cyan.svg') }}" alt="icon">
                </div>
                <p class="font-medium">Guaranteed</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <div class="flex shrink-0 w-6 h-6">
                    <img src="{{ asset('assets/icons/location-purple.svg') }}" alt="icon">
                </div>
                <p class="font-medium">{{ $job->location }}</p>
            </div>
        </div>

        <hr class="border-[#E8E4F8]">

        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-[2px]">
                <p class="font-bold text-lg leading-[27px]">Rp
                    {{ number_format($job->salary, 0, ',', '.') }}</p>
                <p class="text-sm leading-[21px]">/month</p>
            </div>
            <a href="{{ route('front.details', $job->slug) }}"
                class="rounded-full p-[14px_24px] bg-[#FF6B2C] font-semibold text-white hover:shadow-[0_10px_20px_0_#FF6B2C66] transition-all duration-300">Details</a>
        </div>
    </div>
</div>
