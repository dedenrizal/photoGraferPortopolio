<x-layout>
    <x-slot name="title">Contact</x-slot>
    <div class="text-center">
        <h2 class="text-3xl font-bold mb-4">Contact Me</h2>
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="/send-message" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" autocomplete="off" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" autocomplete="off" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="4" class="mt-1 block w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-300">Send Message</button>
        </form>
    </div>
</x-layout>
