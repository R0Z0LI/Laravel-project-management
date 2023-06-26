@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@if(count($projects) == 0)
<p>No Project found.</p>
@endif

<a href="/projects/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add Project</a>
@foreach($projects as $project)
    <div class="p-3 md:grid gap-4 border-2 border-black">
        <a href="/projects/{{$project['id']}}/details">{{$project['name']}}</a>
        <p>{{$project['description']}}</p>
        <p>{{$project['id']}}</p>
        <form method="POST" action="/projects/{{$project['id']}}">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
        <a href="/projects/{{$project['id']}}/edit">Edit</a>
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
        <form method="POST" action="/projects/{{$project['id']}}/archive">
            @csrf
            @method('PUT')
            <button>{{ $project['isArchived'] ? 'Archive' : 'Activate' }}</button>
        </form>
    </div>
@endforeach


@endsection