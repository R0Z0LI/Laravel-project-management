@extends('layout')

@section('content')

@if(count($projects) == 0)
<p class="font-bold uppercase text-center mt-10 text-xl">No Project found.</p>
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
        <x-project-card :project="$project" />
    @endforeach
</div>
@endsection