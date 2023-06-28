@extends('layout')

@section('content')
@if(count($tasks) == 0)
<p class="font-bold uppercase text-center mt-10 text-xl">No Task found.</p>
@endif

<div class="flex flex-row justify-between mr-8 ml-8 mb-4">
    <form method="GET" action="/tasks">
        @csrf
        <input type="hidden" name="show_archived" value="{{ !$showArchived }}">
        <button class="bg-blue-600 text-black py-2 px-5 hover:text-laravel">{{ $buttonLabel }}</button>
    </form>
    <p class="font-bold uppercase py-2 px-5">Tasks</p>
    <a href="/tasks/create" class="bg-blue-600 text-black py-2 px-5 hover:text-laravel">Add Task</a>
</div>
<div class="flex flex-wrap justify-evenly mt-2">
    @foreach($tasks as $task)
    <x-task-admin-card :task="$task" />
    @endforeach
</div>

@endsection