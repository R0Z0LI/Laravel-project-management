@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@if(count($tasks) == 0)
<p>No Task found.</p>
@endif

<a href="/tasks/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add Task</a>
@foreach($tasks as $task)
    <div class="p-3 md:grid gap-4 border-2 border-black">
        <h2>{{$task['name']}}</h2>
        <p>{{$task['description']}}</p>
        <form method="POST" action="/tasks/{{$task['id']}}">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
        <a href="/tasks/{{$task['id']}}/edit">Edit</a>
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

        <form method="POST" action="/tasks/{{$task['id']}}/archive">
            @csrf
            @method('PUT')
            <button>{{ $task['isArchived'] ? 'Activate' : 'Archive' }}</button>
        </form>
    </div>
@endforeach


@endsection