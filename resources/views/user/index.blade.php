<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All User') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           @if($users->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                @foreach($users as $user)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <img src="{{asset('storage/avatars/'.$user->avatar)}}" alt="{{ $user->name }}" class="rounded-full h-10 w-10 object-cover border-2 border-blue-500">
                                </div> 
                                <div>
                                    <h3 class="text-gray-900 text-xl dark:text-gray-100 font-bold">{{ $user->name }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-lg" title="{{ $user->username }}">{{ '@'. $user->username }}</p>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-900 dark:text-gray-100 font-bold" title="{{$user->created_at}}">{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('user.show', $user->username) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>