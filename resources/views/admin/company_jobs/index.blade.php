<x-app-layout>
    @section('title', 'Manage Job Listings')

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Job Listings') }}
            </h2>
            <a href="{{ route('admin.company_jobs.create') }}"
                class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full text-center w-full sm:w-auto">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 sm:p-10 flex flex-col gap-y-5">
                @forelse ($company_jobs as $job)
                    <div
                        class="item-card grid grid-cols-1 lg:grid-cols-12 gap-y-4 lg:gap-x-5 items-center border-b border-gray-100 pb-5 lg:pb-0 lg:border-none">
                        <div class="lg:col-span-4 flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($job->thumbnail) }}" alt=""
                                class="rounded-2xl object-cover w-[60px] h-[60px] lg:w-[120px] lg:h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-lg lg:text-xl font-bold line-clamp-2">
                                    {{ $job->name }}
                                </h3>
                                <p class="text-slate-500 text-sm">
                                    {{ $job->category->name }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden lg:flex flex-col lg:col-span-2">
                            <p class="text-slate-500 text-sm">Salary</p>
                            <h3 class="text-indigo-950 text-lg font-bold">
                                Rp {{ number_format($job->salary, 0, ',', '.') }}/mo
                            </h3>
                        </div>
                        <div class="hidden lg:flex flex-col lg:col-span-2">
                            <p class="text-slate-500 text-sm">Level</p>
                            <h3 class="text-indigo-950 text-lg font-bold">
                                {{ $job->skill_level }}
                            </h3>
                        </div>
                        <div class="hidden lg:flex flex-col lg:col-span-2">
                            <p class="text-slate-500 text-sm">Candidates</p>
                            <h3 class="text-indigo-950 text-lg font-bold">
                                {{ $job->candidates->count() }}
                            </h3>
                        </div>
                        <div class="lg:col-span-2 flex flex-col lg:flex-row lg:justify-end">
                            <a href="{{ route('admin.company_jobs.show', $job) }}"
                                class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full text-center w-full lg:w-auto text-sm lg:text-base">
                                Manage
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-900">No job listings found.</p>
                @endforelse

                <div>
                    {{ $company_jobs->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
