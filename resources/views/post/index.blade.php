<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            TweetWars
        </h2>
    </x-slot>

    

    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-post-modal')">
                Add Post
            </button>
            <x-modal name="add-post-modal" title="Add Post" focusable>
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
            <div class=" dark:bg-gray-900 overflow-hidden sm:rounded-lg">
                @foreach ($posts as $post)
                    <div class="p-6 bg-white dark:bg-gray-800 border-b shadow-sm border-gray-200 dark:border-gray-700 mb-4 rounded-lg">
                        <div class="flex justify-between">
                            <div class="flex">
                                <div class="mr-4">
                                    <img src="{{asset('storage/avatars/'.$post->user->avatar)}}" alt="{{ $post->user->name }}" class="rounded-full h-10 w-10 object-cover border-2 border-blue-500">
                                </div> 
                                <div>
                                    <h3 class="text-gray-900 dark:text-gray-100 font-bold">{{ $post->user->name }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm" title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}
                                        @if($post->created_at != $post->updated_at)
                                            <span title="{{$post->updated_at}}">· (Edited) {{$post->updated_at->diffForHumans()}}</span>
                                        @endif  
                                    </p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:text-blue-600">View</a>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h2 class="text-gray-900 text-xl dark:text-gray-100 font-bold">{{ Str::limit($post->title, 50) }}</h2>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-900 dark:text-gray-100">{{ Str::limit($post->body, 200) }}</p>
                        </div>
                        <div class="mt-4 flex items-center justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            
                            <p class="text-gray-900 dark:text-gray-100 ml-2 mr-4">{{ $total_comment_perpost[$post->id] }}</p>
                            

                            {{-- //total like --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            
                            <p class="text-gray-900 dark:text-gray-100 ml-2">{{ $post->likeCount }}</p>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>