@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@if(count($users) == 0)
<p>No User found.</p>
@endif

@foreach($users as $user)
<h2>{{$user['name']}}</h2>
<p>{{$user['email']}}</p>
@endforeach

@endsection