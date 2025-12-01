<x-app-layout>
    @section('title', 'Job Details')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 sm:p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-col md:flex-row gap-y-5 md:gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($companyJob->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[70px] md:w-[120px] md:h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $companyJob->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $companyJob->category->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center gap-3 w-full md:w-auto">
                        <a href="{{ route('admin.company_jobs.edit', $companyJob) }}"
                            class="font-bold py-3 md:py-4 px-6 bg-indigo-500 text-white rounded-full text-center w-full md:w-auto">
                            Edit Job
                        </a>
                        <a href="#"
                            class="font-bold py-3 md:py-4 px-6 bg-orange-500 text-white rounded-full text-center w-full md:w-auto">
                            Preview
                        </a>
                    </div>
                </div>

                <hr class="my-3 md:my-5">

                <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                    <div>
                        <p class="text-slate-500 text-sm">Salary</p>
                        <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                            Rp {{ number_format($companyJob->salary, 0, ',', '.') }}/mo
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Job Type</p>
                        <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                            {{ $companyJob->type }}
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Location</p>
                        <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                            {{ $companyJob->location }}
                        </h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Level</p>
                        <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                            {{ $companyJob->skill_level }}
                        </h3>
                    </div>
                </div>
                <div>
                    <h3 class="text-indigo-950 text-xl font-bold mb-2">About</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $companyJob->about }}</p>
                </div>
                <div class="flex flex-col md:flex-row gap-y-5 md:gap-x-10">
                    <div class="md:w-1/2">
                        <h3 class="text-indigo-950 text-xl font-bold mb-3">Responsibilities</h3>
                        <ul class="flex flex-col gap-y-3 list-disc pl-5">
                            @foreach ($companyJob->responsibilities as $responsibility)
                                <li class="text-slate-500 text-base">{{ $responsibility->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="md:w-1/2">
                        <h3 class="text-indigo-950 text-xl font-bold mb-3">Qualifications</h3>
                        <ul class="flex flex-col gap-y-3 list-disc pl-5">
                            @foreach ($companyJob->qualifications as $qualification)
                                <li class="text-slate-500 text-base">{{ $qualification->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <hr class="my-5">
                <h3 class="text-indigo-950 text-xl font-bold">Candidates</h3>

                <div class="flex flex-col gap-y-4">
                    @forelse ($companyJob->candidates as $candidate)
                        <div
                            class="grid grid-cols-1 md:grid-cols-12 gap-y-4 md:gap-x-4 items-center p-4 rounded-xl border border-gray-100 md:border-none">
                            <div class="md:col-span-6 flex flex-row items-center gap-x-3">
                                <img src="{{ Storage::url($candidate->profile->avatar) }}" alt=""
                                    class="rounded-full object-cover w-[50px] h-[50px] md:w-[70px] md:h-[70px]">
                                <div class="flex flex-col">
                                    <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                                        {{ $candidate->profile->name }}
                                    </h3>
                                    <p class="text-slate-500 text-sm">
                                        {{ $candidate->profile->occupation }} • {{ $candidate->profile->experience }}
                                        yrs exp
                                    </p>
                                </div>
                            </div>
                            <div class="md:col-span-3 md:text-center">
                                @if ($candidate->is_hired)
                                    <span
                                        class="inline-block w-full md:w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white text-center">
                                        HIRED
                                    </span>
                                @elseif (!$candidate->is_hired && $companyJob->is_open)
                                    <span
                                        class="inline-block w-full md:w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white text-center">
                                        WAITING
                                    </span>
                                @elseif (!$candidate->is_hired)
                                    <span
                                        class="inline-block w-full md:w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white text-center">
                                        REJECTED
                                    </span>
                                @endif
                            </div>
                            <div class="md:col-span-3 md:text-right">
                                <a href="{{ route('admin.job_candidates.show', $candidate) }}"
                                    class="inline-block font-bold py-3 px-6 bg-indigo-700 text-white rounded-full text-center w-full md:w-auto text-sm md:text-base">
                                    Details
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-900">No candidates found yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
