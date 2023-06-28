@extends('layout')

@section('content')

<p class="text-center ml-4 font-bold uppercase">Your Tasks</p>
@if(count($tasks) == 0)
    <p>No Task found.</p>
@endif

<div class="flex flex-wrap justify-evenly">
    @foreach ($tasks as $task)
        <x-task-user-card :task="$task"/>
    @endforeach
</div>
@endsection
