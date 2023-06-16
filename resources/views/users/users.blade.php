@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@if(count($users) == 0)
<p>No User found.</p>
@endif

<div>
<a href="/users/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add User</a>
    @foreach($users as $user)
    <div class="p-3 md:grid gap-4 border-2 border-black">
        <h2>Name: {{$user['name']}}</h2>
        <p>Email: {{$user['email']}}</p>
        <form method="Post" action="/users/{{ $user->id }}">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
        <button>Edit</button>
    </div>
    @endforeach
</div>

@endsection