<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Send Email') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-gray-500 dark:text-gray-400">Kirim Pesan ke Email Tujuan suka - suka.</p>
            <form class="" method="POST" action="{{ route('send.email') }}" enctype="multipart/form-data">
                @csrf
                {{-- name --}}
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Nama anda')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                {{-- email pengirim --}}
                <div class="mt-4">
                    <x-input-label for="email_pengirim" :value="__('Email Anda')" />
                    <x-text-input id="email_pengirim" class="block mt-1 w-full" type="email" name="email_pengirim"  required />
                    <x-input-error :messages="$errors->get('email_pengirim')" class="mt-2" />
                </div>

                {{-- email tujuan --}}
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email tujuan')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- subject --}}
                <div class="mt-4">
                    <x-input-label for="subject" :value="__('Subject Email')" />
                    <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject"  required />
                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                </div>

                {{-- body email --}}
                <div class="mt-4">
                    <x-input-label for="body" :value="__('Body Email')" />
                    <x-textarea rows="5" id="body" class="block mt-1 w-full" name="body" required></x-textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
               
                
                {{-- Submit --}}
                <div class="flex items-center justify-end mt-10">
                    <x-primary-button class="ml-4">
                        {{ __('Send Email') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>