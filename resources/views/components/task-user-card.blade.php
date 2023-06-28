@props(['task'])

<div class="border-black border-2 p-2">
            <h2>Task: {{$task['name']}}</h2>
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
            </form>
        </div>