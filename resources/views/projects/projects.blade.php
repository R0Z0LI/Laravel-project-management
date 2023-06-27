@extends('layout')

@section('content')

@if(count($projects) == 0)
<p>No Project found.</p>
@endif
<div class="flex flex-row justify-between mr-8 ml-8 mb-4">
    <form method="GET" action="/projects">
        @csrf
        <input type="hidden" name="show_archived" value="{{ !$showArchived }}">
        <button class="bg-blue-600 text-black py-2 px-5">{{ $buttonLabel }}</button>
    </form>
    <p class="font-bold uppercase py-2 px-5">Projects</p>
    <a href="/projects/create" class="bg-blue-600 text-black py-2 px-5">Add Project</a>
</div>
<div class="flex flex-wrap justify-evenly">
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
                <form method="POST" action="/projects/{{$project['id']}}">
                    @csrf
                    @method('DELETE')
                    <button class="mr-4 bg-blue-600 text-black py-2 px-5">Delete</button>
                </form>
                <a class="mr-4 bg-blue-600 text-black py-2 px-5" href="/projects/{{$project['id']}}/edit">Edit</a>
                <form method="POST" action="/projects/{{$project['id']}}/archive">
                    @csrf
                    @method('PUT')
                    <button class="mr-4 bg-blue-600 text-black py-2 px-5">{{ $project['isArchived'] ? 'Activate' : 'Archive' }}</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection