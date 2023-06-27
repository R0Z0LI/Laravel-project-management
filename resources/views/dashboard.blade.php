@extends('layout')

@section('content')

<div class="m-4">
    <p class="font-bold uppercase">Your Tasks</p>
    @foreach ($tasks as $task)
        <div class="rounded-md border-blue-500 border-4 p-2">
        @if ($task->userId == auth()->id())
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

                <button type="submit" style="display: none;">Update Status</button>
            </form>
        @endif
        </div>
    @endforeach
</div>
@endsection