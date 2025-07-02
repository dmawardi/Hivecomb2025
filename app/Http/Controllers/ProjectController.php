<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('featured', true)
            ->orderBy('created_at', 'desc')
            ->paginate();
        return view('projects.index', compact('projects'));
    }

    public function adminIndex()
    {
        // Add search functionality
        $search = request('search');

        // If a search term is provided, filter projects by name or description
        if ($search) {
            $projects = Project::where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate();
        } else {
            $projects = Project::orderBy('created_at', 'desc')->paginate();
        }
        return view('admin.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new project
        // Validate and save the project data
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
}
