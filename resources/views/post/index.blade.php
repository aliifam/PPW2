<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            TweetWars
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-post-modal')">
                Add Post
            </button>
            <x-modal name="add-post-modal" title="Add Post">
                <h2 class="m-6 mb-0 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Create Post
                </h2>
                <form class="m-6" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
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
                    <div class="flex items  center justify-end mt-10">
                        <x-primary-button class="ml-4">
                            {{ __('Add Post') }}
                        </x-primary-button>
                        <x-secondary-button class="ml-4" x-on:click.prevent="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>
                    </div>
                </form>
            </x-modal>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($posts as $post)
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between">
                            <div class="flex">
                                {{-- <div class="mr-4">
                                    <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="rounded-full h-10 w-10 object-cover">
                                </div> --}}
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-100 font-bold">{{ $post->user->name }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:text-blue-600">View</a>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-900 dark:text-gray-100">{{ $post->body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>