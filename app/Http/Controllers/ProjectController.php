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
                ->orWhere('client_name', 'like', '%' . $search . '%')
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
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'client_name' => 'required|string|max:255',
            'completion_date' => 'required|date',
            'technologies' => 'required|string',
            'thumbnail_image' => 'required|image',
            'status' => 'required|in:active,inactive,archived',
            'featured' => 'required|boolean',
        ]);
        // Store the image in the public disk: thumbnails
        $baseFilePath = request()->file('thumbnail_image')->store('thumbnails', 'public');
        // Update the thumbnail path in the attributes
        $attributes['thumbnail_image'] = $baseFilePath;

        // Create a new project
        Project::create($attributes);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }
}
