@extends('layout')

@section('content')

<div class="flex justify-center items-center h-screen">
    <div class="rounded-lg border-blue-500 border-4 flex flex-col justify-between items-center w-1/3">
        <p class="text-xl text-center pt-2">Signing in</p>
        <form class="p-2" method="POST" action="/users/authenticate">
            @csrf
            <div class="flex flex-col p-2">
            <label for="email" class="pb-1 ">
                Email
            </label>
            <input
            class="border-2 border-black w-60 rounded-lg p-1 "
                type="email"
                required
                name="email"
                id="email"
            />
            </div>
            <div class="flex flex-col p-2">
            <label for="password" class="pb-1 ">
                Password
            </label>
            <input
            class="border-2 border-black w-60 rounded-lg p-1 "
                type="password"
                required
                id="password"
                name="password"
            />
            </div>
            <button class="border-2 border-black rounded-lg m-2 p-1 ">
            Submit
            </button>
        </form>
    </div>
</div>
@endsection