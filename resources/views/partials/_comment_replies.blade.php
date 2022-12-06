@foreach($comments as $comment)
    <div class="ml-10">
        <div class="p-6 pl-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <div class="flex justify-between">
                <div class="flex">
                    <div class="mr-4">
                        <img  src="{{asset('storage/avatars/'.$comment->user->avatar)}}" alt="{{ $comment->user->name }}" class="rounded-full h-10 w-10 object-cover">
                    </div>
                    <div>
                        <h3 class="text-gray-900 dark:text-gray-100 font-bold">{{ $comment->user->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm" title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}
                            @if($comment->created_at != $comment->updated_at)
                                <span title="{{$comment->updated_at}}">· (Edited) {{$comment->updated_at->diffForHumans()}}</span>
                            @endif  
                        </p>
                    </div>
                </div>
                <div>
                    <a 
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'reply-modal-{{ $comment->id }}')"
                        class="text-blue-500 hover:text-blue-600 cursor-pointer">Reply
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
                    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-comment-modal-{{$comment->id}}')">
                        Edit
                    </x-primary-button>
                    <x-modal name="edit-comment-modal-{{$comment->id}}">
                        <h2 class="text-lg font-bold m-6">Edit Comment</h2>
                        <form class="m-6" method="POST" action="{{ route('comment.update', $comment->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            {{-- Comment --}}
                            <div class="mt-4">
                                <x-input-label for="body" :value="__('Comment')" />
                                <x-textarea rows="3" id="body" class="block mt-1 w-full" name="body" required>{{ $comment->body }}</x-textarea>
                                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                            </div>
                            
                            {{-- Submit --}}
                            <div class="flex items  center justify-end mt-10">
                                <x-primary-button class="ml-4">
                                    {{ __('Update') }}
                                </x-primary-button>
                                <x-secondary-button class="ml-4" x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </div>
                        </form>
                    </x-modal>
                    <x-danger-button  x-data="" class="ml-2" x-on:click.prevent="$dispatch('open-modal', 'delete-comment-modal-{{$comment->id}}')">
                        Delete
                    </x-danger-button>
                    <x-modal name="delete-comment-modal-{{$comment->id}}">
                        <h2 class="text-lg font-bold m-6">Delete Comment</h2>
                        <p class="m-6">Are you sure you want to delete this comment?</p>
                        <form class="m-6" method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="flex items-center justify-end mt-10">
                                <x-primary-button class="ml-4">
                                    {{ __('Delete') }}
                                </x-primary-button>
                                <x-secondary-button class="ml-4" x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </div>
                        </form>
                    </x-modal>
                @endif
            </div>
        </div>
        
    @include('partials._comment_replies', ['comments' => $comment->reply])
    </div>
@endforeach

