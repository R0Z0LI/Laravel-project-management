@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@if(count($tasks) == 0)
<p>No Task found.</p>
@endif

<a href="/tasks/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add Task</a>
@foreach($tasks as $task)
<h2>{{$task['name']}}</h2>
<p>{{$task['description']}}</p>
@endforeach


@endsection