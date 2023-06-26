<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectController extends Controller
{
    public function index(Request $request) {
        $showArchived = $request->query('show_archived');
        
        if ($showArchived) {
            $projects = Project::all();
        } else {
            $projects = Project::where('isArchived', false)->get();
        }
        
        $buttonLabel = $showArchived ? 'Hide Archived' : 'Show Archived';
        
        return view('projects.projects', [
            'heading' => 'Projects',
            'projects' => $projects,
            'buttonLabel' => $buttonLabel,
            'showArchived' => $showArchived, // Add this line
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

        $project = Project::create([
            'name' => $formFields['name'],
            'description' => $formFields['description'],
            'isArchived' => false,
            'status' => 'active',
            'managerId' => $formFields['manager'],
        ]);

        $project->users()->sync($formFields['users']);
    
        return redirect('/projects');
    }

    public function destroy(Project $project) {
        $project->users()->detach();
        $project->delete();
    
        return redirect('projects');
    }
    
    public function archive(Project $project) {
        $project->isArchived = !$project->isArchived;
        $project->save();
        return redirect('projects');
    }

    public function edit(Project $project) {
        return view('projects.edit', [
            'project' => $project,
            'users' => User::all(),
            'projects' => Project::all(),
        ]);
    }

    public function update(Request $request, Project $project) {
        $formFields = $request->validate([
            'name' =>'required|max:255',
            'description' =>'required|max:255',
            'manager' =>'required',
            'users' => 'array|required',
        ]);
    
        $formFields['isArchived'] = false;
    
        $project->update([
            'name' => $formFields['name'],
            'description' => $formFields['description'],
            'isArchived' => false,
            'status' => 'active',
            'managerId' => $formFields['manager'],
        ]);
        $project->users()->detach();
        $project->users()->sync($formFields['users']);
    
        return redirect('projects');
    }

    public function details(Project $project) {
        return view('projects.details', [
            'project' => $project,
            'tasks' => Task::all(),
        ]);
    }

    public function status(Project $project, Request $request) {
        $newStatus = $request->input('status');
        $project->status = $newStatus;
        $project->save();



        return redirect('/projects');
    }
    
}
