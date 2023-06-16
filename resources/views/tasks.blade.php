@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@if(count($tasks) == 0)
<p>No Task found.</p>
@endif

@foreach($tasks as $task)
<h2>{{$task['name']}}</h2>
<p>{{$task['description']}}</p>
@endforeach


@endsection