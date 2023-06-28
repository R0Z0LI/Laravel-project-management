@props(['task'])

<div class="p-3 md:grid gap-4 border-2 border-black  mt-2">
            <h2>Name: {{$task['name']}}</h2>
            <p>Description: {{$task['description']}}</p>
            <form method="POST" action="/tasks/{{ $task->id }}/status" id="status-form">
                @csrf
                @method('PUT')
                
                <label for="status">Status:</label>
                <select name="status" id="status" onchange="document.getElementById('status-form').submit()">
                    @foreach (\App\Enums\TaskStatus::values() as $status)
                        <option value="{{ $status }}" {{ $task->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" style="display: none;">Update Status</button>
            </form>
            <div class="flex flex-row justify-evenly">
                <form method="POST" action="/tasks/{{$task['id']}}" id="delete-form">
                @csrf
                @method('DELETE')
                <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel" onclick="showConfirmationDialog(event)">
                    Delete
                </button>
                </form>

                <script>
                    function showConfirmationDialog(event) {
                        event.preventDefault();
                        if (confirm('Are you sure you want to delete this?')) {
                            document.getElementById('delete-form').submit();
                        }
                    }
                </script>
                <a class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel" href="/tasks/{{$task['id']}}/edit">
                    Edit
                </a>
                <form method="POST" action="/tasks/{{$task['id']}}/archive">
                    @csrf
                    @method('PUT')
                    <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel">
                        {{ $task['isArchived'] ? 'Activate' : 'Archive' }}
                    </button>
                </form>
            </div>
        </div>