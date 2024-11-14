<x-layout>
    <x-slot name="title">
        Gallery
    </x-slot>

    <div class="container mx-auto mt-8 p-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Gallery</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($photos as $photo)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="{{ asset('images/' . $photo->path) }}" alt="{{ $photo->title }}" class="rounded-lg">
                    <h3 class="mt-2 text-lg font-semibold">{{ $photo->title }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
