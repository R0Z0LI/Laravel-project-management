@extends('layout')

@section('content')

<form method="POST" action="/tasks/{{$task->id}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div>
    <div class="md:w-[400px] bg-white p-2 rounded-md">
      <div class="flex flex-col p-2">
        <label for="name" class="pb-1 ">
          Name
        </label>
        <input class="border-2 border-black w-60 rounded-lg p-1 " type="string" required name="name" id="name" value="{{ $task->name }}" />
      </div>
      <div class="flex flex-col p-2">
        <label for="desc" class="pb-1 ">
          Description
        </label>
        <input class="border-2 border-black w-60 rounded-lg p-1 " type="string" required id="desc" name="desc" value="{{ $task->description }}" />
      </div>
      <div class="flex flex-col p-2">
        <label for="users" class="pb-1 ">
          User
        </label>
        <select name="users" id="users">
          @foreach ($users as $user)
          <option value="{{$user->id}}" {{ ($task->userId == $user->id) ? 'selected' : '' }}>
            {{$user->name}}
          </option>
          @endforeach
        </select>
      </div>

      <div class="flex flex-col p-2">
        <label for="projects" class="pb-1 ">
          Project
        </label>
        <select name="projects" id="projects">
          @foreach ($projects as $project)
          <option value="{{$project->id}}">
            {{$project->name}}
          </option>
          @endforeach
        </select>
      </div>
      <div class="flex flex-col p-2"></div>
      <button class="border-2 border-black rounded-lg m-2 p-1 ">
        Submit
      </button>
    </div>
  </div>
</form>

@endsection