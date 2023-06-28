@extends('layout')

@section('content')

<form method="POST" action="/users" enctype="multipart/form-data">
  @csrf
  <div>
    <div class="md:w-[400px] bg-white p-2 rounded-md">
      <div class="flex flex-col p-2">
        <label for="name" className="pb-1 ">
          Name
        </label>
        <input class="border-2 border-black w-60 rounded-lg p-1 " type="text" required name="name" id="name" />
      </div>
      <div class="flex flex-col p-2">
        <label for="email" className="pb-1 ">
          Email
        </label>
        <input class="border-2 border-black w-60 rounded-lg p-1 " type="text" required id="email" name="email" />
      </div>
      <div class="flex flex-col p-2">
        <label for="password" className="pb-1 ">
          Password
        </label>
        <input class="border-2 border-black w-60 rounded-lg p-1 " type="password" id="password" name="password" />
      </div>
      <div class="flex flex-col p-2">
        <label for="roles" className="pb-1 ">
          Role
        </label>
        <select name="isAdmin" id="isAdmin">
          <option value="0">User</option>
          <option value="1">Admin</option>
        </select>
      </div>
      <button class="border-2 border-black rounded-lg m-2 p-1 ">
        Submit
      </button>
    </div>
  </div>
</form>
@endsection