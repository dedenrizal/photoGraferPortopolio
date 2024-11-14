<x-dashlayout>
    <x-slot name="title">dashpesan</x-slot>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
            <thead class="bg-blue-200">
                <tr>
                    <th class="py-2 px-4 border-b text-center text-blue-600">ID</th>
                    <th class="py-2 px-4 border-b text-center text-blue-600">nama</th>
                    <th class="py-2 px-4 border-b text-center text-blue-600">email</th>
                    <th class="py-2 px-4 border-b text-center text-blue-600">pesan</th>
                    <th class="py-2 px-4 border-b text-center text-blue-600">action</th>
                </tr>
            </thead>
            <tbody class="table-hover">
                @foreach ($messages as $message)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $message->id }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $message->name }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $message->email }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $message->message }}</td>
                    
                    <td class="py-2 px-4 border-b text-center">
                            <form action="{{ route('delete-message', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
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
</x-dashlayout>