<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;

class TaskController extends Controller
{

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' =>'required|max:255',
            'desc' =>'required|max:255',
            'users' =>'required',
            'projects' =>'required',
        ]);
    
        $formFields['isArchived'] = false;
    
        Task::create([
            'name' => $formFields['name'],
            'description' => $formFields['desc'],
            'isArchived' => $formFields['isArchived'],
            'status' => 'to-do',
            'userId' => $formFields['users'],
            'project_id' => $formFields['projects']
        ]);
    
        return redirect('/tasks');
    }

    public function edit(Task $task) {
        return view('tasks.edit', [
            'task' => $task,
            'users' => User::all(),
            'projects' => Project::all(),
        ]);
    }

    public function update(Request $request, Task $task) {
        $formFields = $request->validate([
            'name' =>'required|max:255',
            'desc' =>'required|max:255',
            'users' =>'required',
            'projects' =>'required',
        ]);
    
        $formFields['isArchived'] = false;
    
        $task->update([
            'name' => $formFields['name'],
            'description' => $formFields['desc'],
            'isArchived' => $formFields['isArchived'],
            'status' => 'to-do',
            'userId' => $formFields['users'],
            'project_id' => $formFields['projects']
        ]);
    
        return redirect('/tasks');
    }

    public function index() {
        return view('tasks.tasks', [
            'heading' => 'Tasks',
            'tasks' => Task::all(),
        ]);
    }

    public function create() {
        return view('tasks.create', [
            'tasks' => Task::all(),
            'users' => User::all(),
            'projects' => Project::all(),
        ]);
    }
}
