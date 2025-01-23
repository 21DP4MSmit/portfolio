<?php

namespace App\Http\Controllers;

use App\Models\TechStack;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class TechStacksController extends Controller
{
    public function index()
    {
        $techStacks = TechStack::all()->map(function ($stack) {
            return [
                'id' => $stack->id,
                'name' => $stack->name,
                'icon_url' => $stack->icon ? asset("storage/tech-stacks/{$stack->icon}") : null,
                'proficiency' => $stack->proficiency,
                'category' => $stack->category
            ];
        });

        return Inertia::render('Admin/TechStacks/Index', [
            'techStacks' => $techStacks
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/TechStacks/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'proficiency' => 'required|integer|min:1|max:100',
            'category' => 'required|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('tech-stacks', 'public');
            $validated['icon'] = basename($path);
        }
    
        TechStack::create($validated);

        return redirect()->route('admin.tech-stacks.index')->with('success', 'Tech Stack created successfully.');
    }

    public function edit(TechStack $techStack)
    {
        return Inertia::render('Admin/TechStacks/Edit', [
            'techStack' => [
                'id' => $techStack->id,
                'name' => $techStack->name,
                'icon_url' => $techStack->icon ? asset("storage/tech-stacks/{$techStack->icon}") : null,
                'proficiency' => $techStack->proficiency,
                'category' => $techStack->category
            ]
        ]);
    }

    public function update(Request $request, TechStack $techStack)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'proficiency' => 'required|integer|min:1|max:100',
            'category' => 'required|string|max:255'
        ]);

        if ($request->hasFile('icon')) {
            // Delete old file if exists
            if ($techStack->icon) {
                Storage::disk('public')->delete('tech-stacks/'.$techStack->icon);
            }
            
            $path = $request->file('icon')->store('tech-stacks', 'public');
            $validated['icon'] = basename($path);
        }
    
        $techStack->update($validated);
        return redirect()->route('admin.tech-stacks.index');
    }

    public function destroy(TechStack $techStack)
    {
        if ($techStack->icon) {
            Storage::disk('public')->delete('tech-stacks/' . $techStack->icon);
        }

        $techStack->delete();

        return redirect()->route('admin.tech-stacks.index')->with('success', 'Tech Stack deleted successfully.');
    }
    }