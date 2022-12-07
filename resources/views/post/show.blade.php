<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            TweetWars
        </h2>
    </x-slot>
    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
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
                            @if($post->user->id == Auth::user()->id)
                                <a x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'edit-post-modal', {{ $post->id }})"
                                    class="text-blue-500 hover:text-blue-600 cursor-pointer">
                                Edit
                                </a>
                                <x-modal name="edit-post-modal" :id="$post->id">
                                    <h2 class="text-xl font-bold m-6 mb-0 dark:text-white">Edit Post</h2>
                                    <form method="POST" class="m-6" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        {{-- Title --}}
                                        <div class="mt-4">
                                            <x-input-label for="title" :value="__('Title')" />
                                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post->title" required autofocus />
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>
                                        {{-- Body --}}
                                        <div class="mt-4">
                                            <x-input-label for="body" :value="__('Body')" />
                                            <x-textarea rows="5" id="body" class="block mt-1 w-full" name="body" required>{{ old('body', $post->body)}}</x-textarea>
                                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                        </div>
                                        {{-- Submit --}}
                                        <div class="flex items-start  justify-end mt-10">
                                            <x-primary-button class="ml-4">
                                                {{ __('Update') }}
                                            </x-primary-button>
                                            <x-secondary-button x-on:click="$dispatch('close')" class="ml-4">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>
                                            <x-danger-button class="ml-4" x-on:click.prevent="$dispatch('open-modal', 'delete-post-modal', {{ $post->id }})">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                                <x-modal name="delete-post-modal" :id="$post->id">
                                    <h2 class="text-xl font-bold m-6 mb-0 dark:text-white">Delete Post</h2>
                                    <form method="POST" class="m-6" action="{{ route('post.destroy', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <p class="text-gray-600 dark:text-gray-400 text-sm">Are you sure you want to delete this post?</p>
                                        {{-- Submit --}}
                                        <div class="flex items-start  justify-end mt-10">
                                            <x-primary-button class="ml-4">
                                                {{ __('Delete') }}
                                            </x-primary-button>
                                            <x-secondary-button x-on:click="$dispatch('close')" class="ml-4">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>
                                        </div>
                                    </form>
                                </x-modal>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $post->title }}
                        </h2>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-900 dark:text-gray-100">{{ $post->body }}</p>
                    </div>
                    <div class="mt-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                         <p class="font-semibold text-gray-800 dark:text-gray-200 leading-tight ml-2">
                            @if ($total_comment > 1)
                                {{ $total_comment }} Comments
                            @elseif ($total_comment == 1)
                                {{ $total_comment }} Comment
                            @else
                                No Comment
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form class="m-6" method="POST" action="{{ route('comment.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Comment --}}
                    <div class="mt-4">
                        <x-input-label for="body" :value="__('Comment')" />
                        <x-textarea rows="3" id="body" class="block mt-1 w-full" name="body" required>{{ old('body') }}</x-textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>
                    <div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    
                    {{-- Submit --}}
                    <div class="flex items-center justify-end mt-10">
                        <x-primary-button class="ml-4">
                            {{ __('Comment') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white mr-10 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>