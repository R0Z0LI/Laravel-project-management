@extends('layout')

@section('content')

@if(count($projects) == 0)
<p>No Project found.</p>
@endif
<div class="flex flex-row justify-between mr-8 ml-8 mb-4">
    <form method="GET" action="/projects">
        @csrf
        <input type="hidden" name="show_archived" value="{{ !$showArchived }}">
        <button class="bg-blue-600 text-black py-2 px-5 hover:text-laravel">{{ $buttonLabel }}</button>
    </form>
    <p class="font-bold uppercase py-2 px-5">Projects</p>
    <a href="/projects/create" class="bg-blue-600 text-black py-2 px-5 hover:text-laravel">Add Project</a>
</div>
<div class="flex flex-wrap justify-evenly mt-2">
    @foreach($projects as $project)
        <div class="p-3 md:grid gap-4 border-2 border-black">
            <a href="/projects/{{$project['id']}}/details">Name: {{$project['name']}}</a>
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
                    <button class="mr-4 bg-blue-600 text-black py-2 px-5 hover:text-laravel" onclick="showConfirmationDialog(event)">Delete</button>

                    <script>
                    function showConfirmationDialog(event) {
                        event.preventDefault();
                        if (confirm('Are you sure you want to delete this? This will delete all of the tasks that are linked to this project!')) {
                            document.getElementById('delete-form').submit();
                        }
                    }
                    </script>
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
    @endforeach
</div>
@endsection