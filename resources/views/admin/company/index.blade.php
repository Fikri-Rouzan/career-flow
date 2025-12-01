<x-app-layout>
    @section('title', 'My Company')

    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Company') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($company->logo) }}" alt=""
                            class="rounded-2xl object-cover w-[60px] h-[60px] md:w-[90px] md:h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                                {{ $company->name }}
                            </h3>
                            <p class="text-slate-500 text-sm">
                                {{ $company->jobs->count() }} jobs posted
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.company.edit', $company) }}"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit Company
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-indigo-950 text-xl font-bold mb-2">About</h3>
                    <p class="text-slate-700 text-sm leading-relaxed">
                        {{ $company->about }}
                    </p>
                </div>
                <div class="md:hidden w-full mt-8">
                    <a href="{{ route('admin.company.edit', $company) }}"
                        class="block w-full text-center font-bold py-3 px-6 bg-indigo-700 text-white rounded-full">
                        Edit Company
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
