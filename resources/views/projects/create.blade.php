@extends('layout')

@section('content')

<form method="POST" action="/projects" enctype="multipart/form-data">
    @csrf 
    <div>
        <div class="md:w-[400px] bg-white p-2 rounded-md">
            <div class="flex flex-col p-2">
                <label for="name" class="pb-1">
                    Name
                </label>
                <input
                    class="border-2 border-black w-60 rounded-lg p-1"
                    type="string"
                    required
                    id="name"
                    name="name"
                />
            </div>
            <div class="flex flex-col p-2">
                <label for="description" class="pb-1">
                    Description
                </label>
                <input
                    class="border-2 border-black w-60 rounded-lg p-1"
                    type="string"
                    required
                    id="email"
                    name="description"
                />
            </div>
            <div class="flex flex-col p-2">
                <label for="manager" class="pb-1">
                    Manager
                </label>
                <select
                    name="manager"
                    id="manager"
                >
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col p-2">
                <label for="users" class="pb-1">
                    Users
                </label>
                <div>
                    @foreach ($users as $user)
                        <div>
                            <input
                                type="checkbox"
                                id="users-{{ $user->id }}"
                                name="users[]"
                                value="{{ $user->id }}"
                            />
                            <label for="users-{{ $user->id }}">{{ $user->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="border-2 border-black rounded-lg m-2 p-1">
                Submit
            </button>
        </div>
    </div>
</form>

@endsection
