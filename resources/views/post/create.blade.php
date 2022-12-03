<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form class="m-4" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div>
                        <x-input-label for="title" :value="__('Post Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    {{-- Content --}}
                    <div class="mt-4">
                        <x-input-label for="body" :value="__('Post Body')" />
                        <x-textarea rows="5" id="body" class="block mt-1 w-full" name="body" required>{{ old('body') }}</x-textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>
                    {{-- Image --}}
                    {{-- <div class="mt-4">
                        <x-input-label for="image" :value="__('Post Image')" />
                        <input type="file" name="image" id="image" class="block mt-1 w-full">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div> --}}
                    {{-- Submit --}}
                    <div class="flex items-center justify-end mt-10">
                        <x-primary-button class="ml-4">
                            {{ __('Create Post') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>