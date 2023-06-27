@extends('layout')

@section('content')
@if(count($tasks) == 0)
<p>No Task found.</p>
@endif

<div class="flex flex-row justify-between mr-8 ml-8 mb-4">
    <form method="GET" action="/tasks">
        @csrf
        <input type="hidden" name="show_archived" value="{{ !$showArchived }}">
        <button class="bg-blue-600 text-black py-2 px-5">{{ $buttonLabel }}</button>
    </form>
    <p class="font-bold uppercase py-2 px-5">Tasks</p>
    <a href="/tasks/create" class="bg-blue-600 text-black py-2 px-5">Add Task</a>
</div>
<div class="flex flex-wrap justify-evenly">
@foreach($tasks as $task)
    <div class="p-3 md:grid gap-4 border-2 border-black">
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
            <form method="POST" action="/tasks/{{$task['id']}}">
                @csrf
                @method('DELETE')
                <button class="mr-4 bg-blue-600 text-black py-2 px-5">Delete</button>
            </form>
            <a class="mr-4 bg-blue-600 text-black py-2 px-5" href="/tasks/{{$task['id']}}/edit">Edit</a>
            <form method="POST" action="/tasks/{{$task['id']}}/archive">
                @csrf
                @method('PUT')
                <button class="mr-4 bg-blue-600 text-black py-2 px-5">{{ $task['isArchived'] ? 'Activate' : 'Archive' }}</button>
            </form>
        </div>
    </div>
@endforeach
</div>

@endsection