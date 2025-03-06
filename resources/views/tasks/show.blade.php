<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold">Task Details</h2>

        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description ?? 'No description provided' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
        <p><strong>Due Date:</strong> {{ $task->due_date ?? 'No Due Date' }}</p>

        <a href="{{ route('tasks.edit', $task) }}" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded">Edit Task</a>
        <a href="{{ route('tasks.index') }}" class="mt-4 inline-block text-blue-500">Back to Task List</a>
    </div>
</x-app-layout>
