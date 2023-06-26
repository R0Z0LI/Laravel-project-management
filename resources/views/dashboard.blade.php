@extends('layout')

@section('content')

@foreach ($tasks as $task)
    @if ($task->userId == auth()->id())
        <h2>{{$task['name']}}</h2>
        <p>{{$task['description']}}</p>
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
@endforeach

@endsection