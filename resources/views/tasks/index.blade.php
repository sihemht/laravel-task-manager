<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager | My Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <h1 class="text-2xl font-bold mb-6 text-gray-800">My Task List</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="mb-8">
            @csrf
            <div class="flex gap-2">
                <input type="text" name="title" placeholder="Enter a new task..."
                    class="flex-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                    Add Task
                </button>
            </div>
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </form>

        <hr class="mb-6">

        <ul class="space-y-4">
            @forelse($tasks as $task)
            <li class="flex items-center justify-between bg-gray-50 p-4 rounded border">
        
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="background: none; border: none; cursor: pointer; font-size: 1.2rem;">
                            {{ $task->is_completed ? '✅' : '⬜' }}
                        </button>
                    </form>

                    <span style="{{ $task->is_completed ? 'text-decoration: line-through; color: gray;' : '' }}">
                        {{ $task->title }}
                    </span>
                </div>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                        Delete
                    </button>
                </form>
            </li>
            @empty
            <p class="text-center text-gray-500">No tasks for the moment. Great job!</p>
            @endforelse
        </ul>
    </div>

</body>

</html>