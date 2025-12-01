<x-app-layout>
    @section('title', 'New Job')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-6 sm:p-10 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('admin.company_jobs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name"
                            placeholder="Type your job title" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Job Type')" />
                        <select name="type" id="type"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="salary" :value="__('Salary')" />
                        <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary"
                            min="0" :value="old('salary')" required autofocus autocomplete="salary"
                            placeholder="Type your salary amount" />
                        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                            :value="old('location')" required autofocus autocomplete="location"
                            placeholder="Type your job location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="skill_level" :value="__('Level')" />
                        <select name="skill_level" id="skill_level"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Expert">Expert</option>
                        </select>
                        <x-input-error :messages="$errors->get('skill_level')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select name="category_id" id="category_id"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required
                            autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full p-3" placeholder="Type your job description"></textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    <div class="mt-4">
                        <div class="flex flex-col gap-y-5">
                            @for ($i = 0; $i < 4; $i++)
                                <div> <x-input-label for="responsibilities_{{ $i }}" :value="__('Responsibilities')" />
                                    <input type="text" id="responsibilities_{{ $i }}"
                                        class="mt-1 py-3 rounded-lg border-slate-300 border w-full"
                                        placeholder="Type your responsibilities" name="responsibilities[]">
                                </div>
                            @endfor
                        </div>
                        <x-input-error :messages="$errors->get('responsibilities')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    <div class="mt-4">
                        <div class="flex flex-col gap-y-5">
                            @for ($i = 0; $i < 4; $i++)
                                <div>
                                    <x-input-label for="qualifications_{{ $i }}" :value="__('Qualifications')" />
                                    <input type="text" id="qualifications_{{ $i }}"
                                        class="mt-1 py-3 rounded-lg border-slate-300 border w-full"
                                        placeholder="Type your qualifications" name="qualifications[]">
                                </div>
                            @endfor
                        </div>
                        <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                    </div>

                    <input type="hidden" name="company_id" value="{{ $my_company->id }}">

                    <div class="flex items-center justify-end mt-8">
                        <button type="submit"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full w-full sm:w-auto text-center">
                            Add New Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
