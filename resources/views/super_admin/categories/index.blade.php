<x-app-layout>
    @section('title', 'Manage Categories')

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}"
                class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full text-center w-full sm:w-auto">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 sm:p-10 flex flex-col gap-y-5">
                @forelse ($categories as $category)
                    <div
                        class="item-card grid grid-cols-1 md:grid-cols-12 gap-y-3 md:gap-x-10 items-center border-b border-gray-100 pb-5 md:pb-0 md:border-none">
                        <div class="md:col-span-6 flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($category->icon) }}" alt=""
                                class="rounded-2xl object-cover w-[60px] h-[60px] md:w-[90px] md:h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col md:col-span-3">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-lg md:text-xl font-bold">
                                {{ $category->created_at->format('d M, Y') }}
                            </h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3 md:col-span-3 md:justify-end">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full text-center w-full md:w-auto text-sm md:text-base">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-bold py-3 px-5 bg-red-700 text-white rounded-full w-full md:w-auto text-sm md:text-base text-center">
                                    Delete
                                </button>
                            </form>
                        </div>
                        <div class="flex md:hidden flex-col gap-3">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full text-center">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-bold py-3 px-5 bg-red-700 text-white rounded-full w-full text-center">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-900">No categories found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
