@foreach($comments as $comment)
    <div class="ml-10">
        <div class="p-6 pl-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <div class="flex justify-between">
                <div class="flex">
                    {{-- <div class="mr-4">
                        <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" class="rounded-full h-10 w-10 object-cover">
                    </div> --}}
                    <div>
                        <h3 class="text-gray-900 dark:text-gray-100 font-bold">{{ $comment->user->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div>
                    <a 
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'reply-modal-{{ $comment->id }}')"
                        class="text-blue-500 hover:text-blue-600">Reply
                    </a>
                    <x-modal name="reply-modal-{{ $comment->id }}">
                        <h2 class="text-lg font-bold m-6">reply to {{ $comment->user->name }}</h2>
                        <form class="m-6" method="POST" action="{{ route('reply.store') }}" enctype="multipart/form-data">
                                @csrf
                                {{-- Comment --}}
                                <div class="mt-4">
                                    <x-input-label for="body" :value="__('Reply')" />
                                    <x-textarea rows="3" id="body" class="block mt-1 w-full" name="body" required>{{ old('body') }}</x-textarea>
                                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                </div>
                                <div>
                                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                </div>
                                
                                {{-- Submit --}}
                                <div class="flex items-center justify-end mt-10">
                                    <x-primary-button class="ml-4">
                                        {{ __('Reply') }}
                                    </x-primary-button>
                                    <x-secondary-button class="ml-4" x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                </div>
                            </form>
                    </x-modal>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-gray-900 dark:text-gray-100">{{ $comment->body }}</p>
            </div>
            <div class="mt-4 flex">
                @if ($comment->user_id == Auth::user()->id)
                    <x-primary-button wire:click="edit({{ $comment->id }})">
                        Edit
                    </x-primary-button>
                    <x-danger-button class="ml-2" wire:click="delete({{ $comment->id }})">
                        Delete
                    </x-danger-button>
                @endif
            </div>
        </div>
        
    @include('partials._comment_replies', ['comments' => $comment->reply])
    </div>
@endforeach

