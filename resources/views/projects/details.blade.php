@extends('layout')

@section('content')

@foreach ($tasks as $task)
    @if ($task->project_id == $project->id)
        <h2>{{$task['name']}}</h2>
        <p>{{$task['description']}}</p>
    @endif
@endforeach

@endsection