@props(['project'])

<div class="p-3 md:grid gap-4 border-2 border-black">
    <a href="/projects/{{$project['id']}}/details" class="text-blue-700">Name: {{$project['name']}}</a>
    <p>Description: {{$project['description']}}</p>
    <form method="POST" action="/projects/{{ $project->id }}/status" id="project-status-form">
        @csrf
        @method('PUT')

        <label for="status">Status:</label>
        <select name="status" id="status" onchange="document.getElementById('project-status-form').submit()">
            @foreach (\App\Enums\ProjectStatus::values() as $status)
            <option value="{{ $status }}" {{ $project->status === $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
            @endforeach
        </select>

        <button type="submit" style="display: none;">Update Status</button>
    </form>
    <div class="flex flex-row justify-evenly">
        <form method="POST" action="/projects/{{$project['id']}}" id="delete-form">
            @csrf
            @method('DELETE')
            <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel" onclick="return confirm('Are you sure you want to delete this? This will delete all of the tasks that are linked to this project!')">
                Delete
            </button>
        </form>
        <a class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel" href="/projects/{{$project['id']}}/edit">
            Edit
        </a>
        <form method="POST" action="/projects/{{$project['id']}}/archive">
            @csrf
            @method('PUT')
            <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel">
                {{ $project['isArchived'] ? 'Activate' : 'Archive' }}
            </button>
        </form>
    </div>
</div>