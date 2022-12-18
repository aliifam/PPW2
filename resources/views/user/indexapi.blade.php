<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('All User from API') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="users">

        </div>
    </div>

    <script name="scripts">
        fetch('/api/users')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let html = '';
                data.forEach(user => {
                    html += `
                    <div class="bg-white mb-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex justify-between">
                                <div class="flex items start">
                                    <div class="mr-4">
                                        <a href="storage/avatars/${user.avatar}" data-lightbox="image-1" data-title="${user.name}">
                                            <img src="storage/avatars/${user.avatar}" alt="${user.name}" class="rounded-full h-10 w-10 object-cover border-2 border-blue-500">
                                        </a>
                                    </div>
                                    <div>
                                        <h3 class="text-gray-900 text-xl dark:text-gray-100 font-bold">${user.name}</h3>
                                        <p class="text-gray-600 dark:text-gray-400 text-lg" title="${user.username}">@${user.username}</p>
                                    </div> 
                                </div>
                                <div>
                                    <p class="text-gray-900 dark:text-gray-100 font-bold" title="${user.created_at}">${user.created_at}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="/user/@${user.username}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show Detail</a>
                            </div>
                        </div>
                    </div>
                    `;
                });
                document.getElementById('users').innerHTML = html;
            });
    </script>
    
</x-app-layout>

