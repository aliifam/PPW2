@foreach($comments as $comment)
    <div class="ml-10">
    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
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
                <a href="{{ route('post.edit', $comment) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
            </div>
        </div>
        <div class="mt-4">
            <p class="text-gray-900 dark:text-gray-100">{{ $comment->body }}</p>
        </div>
    </div>
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
            </div>
        </form>
    @include('partials._comment_replies', ['comments' => $comment->reply])
    </div>
@endforeach

