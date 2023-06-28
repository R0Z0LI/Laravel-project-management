@props(['user'])

<div class="p-4 m-2 gap-4 border-2 border-black">
    <h2 class="pt-2">Name: {{$user['name']}}</h2>
    <p class="pt-2">Email: {{$user['email']}}</p>
    <div class="flex flex-row justify-evenly pt-2">
        <form method="POST" action="/users/{{$user['id']}}" id="delete-form">
            @csrf
            @method('DELETE')
            <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel"  onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
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