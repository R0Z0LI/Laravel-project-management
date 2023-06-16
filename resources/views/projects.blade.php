@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@if(count($projects) == 0)
<p>No Project found.</p>
@endif

@foreach($projects as $project)
<h2>{{$project['name']}}</h2>
<p>{{$project['description']}}</p>
@endforeach


@endsection