<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('techStacks')->get();
        
        return Inertia::render('Portfolio/Projects', [
            'projects' => $projects
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'tech_stack_ids' => 'required|array'
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('projects', 'public');
            $validated['thumbnail'] = $path;
        }

        $project = Project::create($validated);
        $project->techStacks()->sync($request->tech_stack_ids);

        return redirect()->back()->with('success', 'Project created successfully');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'tech_stack_ids' => 'required|array'
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('projects', 'public');
            $validated['thumbnail'] = $path;
        }

        $project->update($validated);
        $project->techStacks()->sync($request->tech_stack_ids);

        return redirect()->back()->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}