<x-dashlayout>
    <x-slot name="title">
        Upload Photo
    </x-slot>

    <div class="container mx-auto mt-8 p-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Upload Photo</h2>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="/upload-photo" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" autocomplete="off" required>
            </div>
            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" name="photo" id="photo" class="mt-1 block w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" autocomplete="off" required>
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-300">Upload Photo</button>
        </form>
    </div>
</x-dashlayout>
