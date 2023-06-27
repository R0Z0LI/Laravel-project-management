@extends('layout')

@section('content')

@if(count($users) == 0)
<p>No User found.</p>
@endif

<div class="h-80">
    <div class="mt-4 mb-4 flex justify-between mr-4">
        <p class="font-bold uppercase py-2 px-5">Users</p>
        <a href="/users/create" class="bg-blue-600 text-black py-2 px-5">Add User</a>
    </div>
    @foreach($users as $user)
        <div class="p-3 md:grid gap-4 border-2 border-black">
            <h2>Name: {{$user['name']}}</h2>
            <p>Email: {{$user['email']}}</p>
            <form method="POST" action="/users/{{$user['id']}}">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
            <a href="/users/{{$user['id']}}/edit">Edit</a>
            <form method="POST" action="/users/{{$user['id']}}/suspend">
                @csrf
                @method('PUT')
                <button>{{ $user['isSuspended'] ? 'Unsuspend' : 'Suspend' }}</button>
            </form>
        </div>
    @endforeach
</div>

@endsection