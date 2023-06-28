@extends('layout')

@section('content')

@if(count($users) == 0)
<p class="font-bold uppercase text-center mt-10 text-xl">No User found.</p>
@endif

<div class="h-80">
    <div class="mt-4 mb-4 flex justify-between mr-4">
        <p class="font-bold uppercase py-2 px-5">Users</p>
        <a href="/users/create" class="bg-blue-600 text-black py-2 px-5 hover:text-laravel">Add User</a>
    </div>
    <div class="flex flex-wrap justify-evenly">
        @foreach($users as $user)
        <x-user-card :user="$user" />
        @endforeach
    </div>
</div>

@endsection