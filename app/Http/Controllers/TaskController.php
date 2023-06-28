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

    public function destroy(Task $task) {
        $task->delete();

        return redirect('tasks');
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

    public function index(Request $request) {
        $showArchived = $request->query('show_archived');
        
        if ($showArchived) {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('isArchived', false)->get();
        }
        
        $buttonLabel = $showArchived ? 'Hide Archived' : 'Show Archived';
        
        return view('tasks.tasks', [
            'tasks' => $tasks,
            'buttonLabel' => $buttonLabel,
            'showArchived' => $showArchived,
        ]);
    }

    public function create() {
        return view('tasks.create', [
            'tasks' => Task::all(),
            'users' => User::all(),
            'projects' => Project::all(),
        ]);
    }

    public function archive(Task $task) {
        $task->isArchived = !$task->isArchived;
        $task->save();
        return redirect()->back();
    }

    public function status(Task $task, Request $request) {
        $newStatus = $request->input('status');
        $task->status = $newStatus;
        $task->save();



        return redirect()->back();
    }

}
