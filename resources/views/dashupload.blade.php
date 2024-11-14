<x-dashlayout>
    <x-slot name="title">
        Dashupdate
    </x-slot>
    <section>
        <div class="flex items-center mb-4">
            <a href="/upload" class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                New Photo +
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-center text-blue-600">ID</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">Title</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">Path</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">Image</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">Action</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @foreach ($photos as $photo)
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $photo->id }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $photo->title }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $photo->path }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <img src="{{ asset('images/' . $photo->path) }}" alt="{{ $photo->title }}" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                <form action="{{ route('delete-photo', $photo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        <span class="material-icons">delete</span> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-dashlayout>
