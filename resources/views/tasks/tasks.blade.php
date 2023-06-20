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
        <form method="POST" action="/tasks/{{$task['id']}}/archive">
            @csrf
            @method('PUT')
            <button>{{ $task['isArchived'] ? 'Archive' : 'Activate' }}</button>
        </form>
    </div>
@endforeach


@endsection