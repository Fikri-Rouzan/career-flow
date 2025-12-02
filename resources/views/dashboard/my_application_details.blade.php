<x-app-layout>
    @section('title', 'Candidate Details')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 sm:p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-col md:flex-row gap-y-5 md:gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($jobCandidate->job->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[70px] md:w-[120px] md:h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-lg md:text-xl font-bold">{{ $jobCandidate->job->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $jobCandidate->job->category->name }}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Salary</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp {{ number_format($jobCandidate->job->salary, 0, ',', '.') }}/mo
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Job Type</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{ $jobCandidate->job->type }}
                        </h3>
                    </div>
                </div>

                <hr class="my-3 md:my-5">
                <h3 class="text-indigo-950 text-xl font-bold">My Profile</h3>

                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-y-4">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($jobCandidate->profile->avatar) }}" alt=""
                            class="rounded-full object-cover w-[60px] h-[60px] md:w-[70px] md:h-[70px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-lg md:text-xl font-bold">{{ $jobCandidate->profile->name }}
                            </h3>
                            <p class="text-slate-500 text-sm">
                                {{ $jobCandidate->profile->occupation }} - {{ $jobCandidate->profile->experience }} yrs
                                exp
                            </p>
                        </div>
                    </div>
                    <div class="w-full md:w-auto">
                        @if ($jobCandidate->is_hired)
                            <span
                                class="inline-block w-full md:w-fit text-center text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                HIRED
                            </span>
                        @elseif (!$jobCandidate->is_hired && $jobCandidate->job->is_open)
                            <span
                                class="inline-block w-full md:w-fit text-center text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                WAITING
                            </span>
                        @elseif (!$jobCandidate->is_hired)
                            <span
                                class="inline-block w-full md:w-fit text-center text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                                REJECTED
                            </span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-y-3">
                    <h3 class="text-indigo-950 text-xl font-bold mt-2 md:mt-5">Message</h3>
                    <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                        {{ $jobCandidate->message }}
                    </p>
                </div>

                @if ($jobCandidate->candidate_id == Auth::id() && $jobCandidate->is_hired && !$jobCandidate->job->is_open)
                    <hr class="my-5">
                    <div class="bg-green-50 border border-green-200 rounded-xl p-4 md:p-5">
                        <h3 class="text-indigo-950 text-lg md:text-xl font-bold mb-2">Congrats! You've been selected!
                        </h3>
                        <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                            Keep an eye on your email for further instructions from
                            {{ $jobCandidate->job->company->name }}
                            regarding your next steps. Good luck on your new journey!
                        </p>
                    </div>
                @elseif ($jobCandidate->candidate_id == Auth::id() && !$jobCandidate->is_hired && !$jobCandidate->job->is_open)
                    <hr class="my-5">
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 md:p-5">
                        <h3 class="text-indigo-950 text-lg md:text-xl font-bold mb-2">Unfortunately, you have not been
                            selected for this position.</h3>
                        <p class="text-slate-600 text-sm md:text-base mb-4">Please feel free to check and apply for
                            other openings that match your skills.</p>
                        <a href="{{ route('front.index') }}"
                            class="inline-block w-full md:w-fit font-bold py-3 px-8 rounded-full bg-indigo-700 text-white text-center hover:bg-indigo-800 transition-colors">
                            Explore Jobs
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
