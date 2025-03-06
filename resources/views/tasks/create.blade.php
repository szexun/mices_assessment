<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold">Create New Task</h2>

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

        <form action="{{ route('tasks.store') }}" method="POST" class="mt-4">
            @csrf
            <label class="block font-medium">Title:</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded" required >

            <label class="block font-medium mt-2">Description:</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded"></textarea>

            <label class="block font-medium mt-2">Status:</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>

            <label class="block font-medium mt-2">Due Date:</label>
            <input type="date" name="due_date" class="w-full border px-3 py-2 rounded">

            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Save Task</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="mt-4 inline-block text-blue-500">Back to Task List</a>
    </div>
</x-app-layout>
