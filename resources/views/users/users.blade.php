@extends('layout')

@section('content')

@if(count($users) == 0)
<p>No User found.</p>
@endif

<div class="h-80">
    <div class="mt-4 mb-4 flex justify-between mr-4">
        <p class="font-bold uppercase py-2 px-5">Users</p>
        <a href="/users/create" class="bg-blue-600 text-black py-2 px-5 hover:text-laravel">Add User</a>
    </div>
    <div class="flex flex-wrap justify-evenly">
        @foreach($users as $user)
            <div class="p-4 m-2 gap-4 border-2 border-black">
                <h2 class="pt-2">Name: {{$user['name']}}</h2>
                <p class="pt-2">Email: {{$user['email']}}</p>
                <div class="flex flex-row justify-evenly pt-2">
                    <form method="POST" action="/users/{{$user['id']}}">
                        @csrf
                        @method('DELETE')
                        <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel">Delete</button>
                    </form>
                    <a class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel" href="/users/{{$user['id']}}/edit">
                        Edit
                    </a>
                    <form method="POST" action="/users/{{$user['id']}}/suspend">
                        @csrf
                        @method('PUT')
                        <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel">
                            {{ $user['isSuspended'] ? 'Unsuspend' : 'Suspend' }}
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection