<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold">Task List</h2>

        <!-- Show Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Task Filter -->
        <form method="GET" class="my-4">
            <label for="status" class="block font-medium">Filter by Status:</label>
            <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 w-1/6">
                <option value="">All</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </form>

        <!-- Task Table -->
        <table class="w-full border-collapse border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Due Date</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td class="border px-4 py-2">{{ $task->title }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($task->status) }}</td>
                    <td class="border px-4 py-2">{{ $task->due_date ?? 'No Due Date' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('tasks.show', $task) }}" class="text-blue-600">View</a> |
                        <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-600">Edit</a> |
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('tasks.create') }}" class="mt-4 inline-block bg-blue-500  px-4 py-2 rounded">Create Task</a>
    </div>
</x-app-layout>
