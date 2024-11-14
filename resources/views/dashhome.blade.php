<x-dashlayout>
    <x-slot name='title'>dashHome</x-slot>
    <section>
        <div class="flex items-center mb-4">
            <a href="{{ route('home.edit') }}" class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                costumize +
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2 px-4 border-b text-center text-blue-600">ID</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">Title</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">desc</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">photo</th>
                        <th class="py-2 px-4 border-b text-center text-blue-600">action</th>

                    </tr>
                </thead>
                <tbody class="table-hover">
                    @foreach ($homes as $home)
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $home->id }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $home->desc }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $home->path }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <img src="{{ asset('images/' . $home->path) }}" alt="{{ $home->title }}" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                <form action="{{ route('delete-home', $home->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');">
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