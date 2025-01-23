<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TechStack;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{  
    public function index0()
    {
        $projects = Project::with('techStacks')->get()->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'description' => $project->description,
                'thumbnail' => $project->thumbnail 
                    ? Storage::url('projects/' . $project->thumbnail)
                    : null,
                'github_link' => $project->github_link,
                'live_link' => $project->live_link,
                'tech_stacks' => $project->techStacks
            ];
        });

        return Inertia::render('Portfolio/Projects', [
            'projects' => $projects
        ]);
    }

    public function index()
    {
        $projects = Project::with('techStacks')->get()->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'description' => $project->description,
                'thumbnail_url' => $project->thumbnail 
                    ? Storage::url('projects/' . basename($project->thumbnail)) 
                    : null,
                'github_link' => $project->github_link,
                'live_link' => $project->live_link,
                'tech_stacks' => $project->techStacks->map(function($stack) {
                    return [
                        'id' => $stack->id,
                        'name' => $stack->name,
                        'icon_url' => $stack->icon 
                            ? Storage::url('tech-stacks/' . $stack->icon) 
                            : null
                    ];
                })
            ];
        });

        return Inertia::render('Admin/Projects/Index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Projects/Create', [
            'techStacks' => TechStack::all()->map(fn($stack) => [
                'id' => $stack->id,
                'name' => $stack->name,
                'icon_url' => $stack->icon ? Storage::url('tech-stacks/' . $stack->icon) : null,
            ])
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'tech_stacks' => 'nullable|array',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('projects', 'public');
            $validated['thumbnail'] = basename($path);
        }

        $project = Project::create($validated);
        $project->techStacks()->sync($request->tech_stacks);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return Inertia::render('Admin/Projects/Edit', [
            'project' => [
                'id' => $project->id,
                'title' => $project->title,
                'description' => $project->description,
                'thumbnail_url' => $project->thumbnail 
                    ? Storage::url('projects/' . $project->thumbnail) 
                    : null,
                'github_link' => $project->github_link,
                'live_link' => $project->live_link,
                'tech_stacks' => $project->techStacks->pluck('id')
            ],
            'techStacks' => TechStack::all()->map(fn($stack) => [
                'id' => $stack->id,
                'name' => $stack->name,
                'icon_url' => $stack->icon ? asset("storage/tech-stacks/{$stack->icon}") : null,
            ])
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'tech_stacks' => 'nullable|array',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($project->thumbnail) {
                Storage::disk('public')->delete('projects/' . $project->thumbnail);
            }
            
            $path = $request->file('thumbnail')->store('projects', 'public');
            $validated['thumbnail'] = basename($path);
        }

        $project->update($validated);
        $project->techStacks()->sync($request->tech_stacks);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete('projects/' . $project->thumbnail);
        }
        
        $project->techStacks()->detach();
        $project->delete();
        
        return redirect()->back()->with('success', 'Project deleted successfully.');
    }
}