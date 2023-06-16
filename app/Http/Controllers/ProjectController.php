<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        return view('projects', [
            'heading' => 'Projects',
            'projects' => Project::all(),
        ]);
    }
}
