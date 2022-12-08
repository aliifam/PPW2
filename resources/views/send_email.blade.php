<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send Email') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            //make email form to specific email address
            <form action="{{ route('send.email') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="subject" class="sr-only">Subject</label>
                    <input type="text" name="subject" id="subject" placeholder="Subject" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('subject') border-red-500 @enderror" value="{{ old('subject') }}">
                    @error('subject')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="message" class="sr-only">Message</label>
                    <textarea name="message" id="message" cols="30" rows="4" placeholder="Message" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Send Email</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>