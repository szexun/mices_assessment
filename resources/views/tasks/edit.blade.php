<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold">Edit Task</h2>

        <!-- Show Validation Errors -->
        @if($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
       @endif

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="mt-4">
            @csrf @method('PUT')
            <label class="block font-medium">Title:</label>
            <input type="text" name="title" value="{{ $task->title }}" class="w-full border px-3 py-2 rounded" required>

            <label class="block font-medium mt-2">Description:</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded">{{ $task->description }}</textarea>

            <label class="block font-medium mt-2">Status:</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <label class="block font-medium mt-2">Due Date:</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border px-3 py-2 rounded">

            <button type="submit" class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded">Update Task</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="mt-4 inline-block text-blue-500">Back to Task List</a>
    </div>
</x-app-layout>
