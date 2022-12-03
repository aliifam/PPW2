<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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