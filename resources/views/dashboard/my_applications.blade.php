<x-app-layout>
    @section('title', 'Manage Job Applications')

    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Job Applications') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 sm:p-10 flex flex-col gap-y-5">
                @forelse ($my_applications as $application)
                    <div
                        class="item-card grid grid-cols-1 lg:grid-cols-12 gap-y-4 lg:gap-x-5 items-center border-b border-gray-100 pb-5 lg:pb-0 lg:border-none">
                        <div class="lg:col-span-4 flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($application->job->thumbnail) }}" alt=""
                                class="rounded-2xl object-cover w-[60px] h-[60px] lg:w-[120px] lg:h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-lg lg:text-xl font-bold line-clamp-2">
                                    {{ $application->job->name }}
                                </h3>
                                <p class="text-slate-500 text-sm">
                                    {{ $application->job->category->name }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden lg:flex flex-col lg:col-span-3">
                            <p class="text-slate-500 text-sm">Salary</p>
                            <h3 class="text-indigo-950 text-lg font-bold">
                                Rp {{ number_format($application->job->salary, 0, ',', '.') }}/mo
                            </h3>
                        </div>
                        <div class="flex flex-col lg:col-span-3 lg:items-center">
                            <p class="text-slate-500 text-sm mb-1 lg:mb-2 lg:text-center">Status</p>

                            @if ($application->is_hired)
                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                    HIRED
                                </span>
                            @elseif (!$application->is_hired && $application->job->is_open)
                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                    WAITING
                                </span>
                            @elseif (!$application->is_hired)
                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                                    REJECTED
                                </span>
                            @endif
                        </div>
                        <div class="lg:col-span-2 flex flex-col lg:flex-row lg:justify-end">
                            <a href="{{ route('dashboard.my.applications.details', $application) }}"
                                class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full text-center w-full lg:w-auto text-sm lg:text-base">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center gap-4 py-10">
                        <p class="text-gray-900">You haven't applied to any jobs yet.</p>
                        <a href="{{ route('front.index') }}"
                            class="font-bold py-3 px-8 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition-all">
                            Explore Jobs
                        </a>
                    </div>
                @endforelse

                <div>
                    {{ $my_applications->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
