<x-app-layout>
    @section('title', 'Edit Job')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('admin.company_jobs.update', $companyJob) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required
                            value="{{ $companyJob->name }}" autofocus autocomplete="name"
                            placeholder="Type your job title" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Job Type')" />
                        <select name="type" id="type"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Part Time" {{ $companyJob->type == 'Part Time' ? 'selected' : '' }}>Part Time
                            </option>
                            <option value="Full Time" {{ $companyJob->type == 'Full Time' ? 'selected' : '' }}>Full Time
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="salary" :value="__('Salary')" />
                        <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" required
                            min="0" value="{{ $companyJob->salary }}" autofocus autocomplete="salary"
                            placeholder="Type your salary amount" />
                        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" required
                            value="{{ $companyJob->location }}" autofocus autocomplete="location"
                            placeholder="Type your job location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="skill_level" :value="__('Level')" />
                        <select name="skill_level" id="skill_level"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="Beginner" {{ $companyJob->skill_level == 'Beginner' ? 'selected' : '' }}>
                                Beginner</option>
                            <option value="Intermediate"
                                {{ $companyJob->skill_level == 'Intermediate' ? 'selected' : '' }}>
                                Intermediate</option>
                            <option value="Expert" {{ $companyJob->skill_level == 'Expert' ? 'selected' : '' }}>
                                Expert</option>
                        </select>
                        <x-input-error :messages="$errors->get('skill_level')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select name="category_id" id="category_id"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $companyJob->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <img src="{{ Storage::url($companyJob->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus
                            autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full"
                            placeholder="Type your job description">{{ $companyJob->about }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    <div class="mt-4">
                        <div class="flex flex-col gap-y-5">
                            @for ($i = 0; $i < 4; $i++)
                                @php
                                    $responsibilityText = $companyJob->responsibilities[$i]->name ?? '';
                                @endphp

                                <x-input-label for="responsibilities_{{ $i }}" :value="__('Responsibilities')" />
                                <input type="text" id="responsibilities_{{ $i }}"
                                    class="py-3 rounded-lg border-slate-300 border"
                                    placeholder="Type your responsibilities" name="responsibilities[]"
                                    value="{{ old('responsibilities.' . $i, $responsibilityText) }}">
                            @endfor
                        </div>
                        <x-input-error :messages="$errors->get('responsibilities')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    <div class="mt-4">
                        <div class="flex flex-col gap-y-5">
                            @for ($i = 0; $i < 4; $i++)
                                @php
                                    $qualificationText = $companyJob->qualifications[$i]->name ?? '';
                                @endphp

                                <x-input-label for="qualifications_{{ $i }}" :value="__('Qualifications')" />
                                <input type="text" id="qualifications_{{ $i }}"
                                    class="py-3 rounded-lg border-slate-300 border"
                                    placeholder="Type your qualifications" name="qualifications[]"
                                    value="{{ old('qualifications.' . $i, $qualificationText) }}">
                            @endfor
                        </div>
                        <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
                    </div>

                    <input type="hidden" name="company_id" value="{{ $companyJob->company_id }}">

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
