<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <div class="mr-4">
                                <img src="{{asset('storage/avatars/'.$user->avatar)}}" alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover border-2 border-blue-500">
                            </div> 
                            <div>
                                <h3 class="text-gray-900 text-xl dark:text-gray-100 font-bold">{{ $user->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-lg" title="{{ $user->username }}">{{ '@'. $user->username }}</p>
                            </div>
                        </div>
                        <div>
                            @auth
                                @if(Auth::user()->id == $user->id)
                                    <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Profile</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-900 dark:text-gray-100 font-bold">Email: {{ $user->email }}</p>
                        <p class="text-gray-900 dark:text-gray-100 font-bold" title="{{$user->created_at}}">Joined: {{ $user->created_at->diffForHumans() }}</p>
                        <p class="text-gray-900 dark:text-gray-100 font-bold">Total Postingan: {{ $user_posts->count() }}</p>
                        <p class="text-gray-900 dark:text-gray-100 font-bold">Total Komentar: {{ $user_comments->count() }}</p>
                    </div>
                </div>
            </div>

            @if($user_posts->count() > 0)
                <div class="mt-4">
                    <p class="text-gray-900 dark:text-gray-100 font-bold text-lg">Postingan</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                        @foreach($user_posts as $post)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <div class="flex justify-between">
                                        <div class="flex items-start">
                                            <div class="mr-4">
                                                <img src="{{asset('storage/avatars/'.$post->user->avatar)}}" alt="{{ $post->user->name }}" class="rounded-full h-10 w-10 object-cover border-2 border-blue-500">
                                            </div> 
                                            <div>
                                                <h3 class="text-gray-900 text-xl dark:text-gray-100 font-bold">{{ $post->user->name }}</h3>
                                                <p class="text-gray-600 dark:text-gray-400 text-lg" title="{{ $post->user->username }}">{{ '@'. $post->user->username }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-gray-900 dark:text-gray-100 font-bold" title="{{$post->created_at}}">{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-gray-900 dark:text-gray-100 font-bold">{{ $post->title }}</p>
                                        <p class="text-gray-600 dark:text-gray-400 text-lg">{{ Str::limit($post->body, 100) }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('post.show', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4">
                    {{ $user_posts->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>