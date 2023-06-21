<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectController extends Controller
{
    public function index() {
        return view('projects.projects', [
            'heading' => 'Projects',
            'projects' => Project::all(),
        ]);
    }

    public function create() {
        return view('projects.create', [
            'tasks' => Task::all(),
            'users' => User::all(),
            'projects' => Project::all(),
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' =>'required|max:255',
            'description' =>'required|max:255',
            'manager' =>'required',
            'users' => 'array|required',
        ]);
        //dd($formFields);
        $project = Project::create([
            'name' => $formFields['name'],
            'description' => $formFields['description'],
            'isArchived' => false,
            'status' => 'active',
            'managerId' => $formFields['manager'],
        ]);
        //dd($project->id);
        $project->users()->sync($formFields['users']); // attaches the users to the project
    
        return redirect('/projects');
    }
    
}
