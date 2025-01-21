<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\TechStack;
use App\Models\Education;
use App\Models\WorkExperience;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    public function index()
    {
        return Inertia::render('Portfolio/Home', [
            'about' => About::first(),
            'techStacks' => TechStack::all(),
            'education' => Education::orderBy('end_date', 'desc')->get(),
            'experience' => WorkExperience::orderBy('start_date', 'desc')->get(),
        ]);
    }

    public function projects()
    {
        return Inertia::render('Portfolio/Projects', [
            'projects' => Project::with('techStacks')->get()
        ]);
    }

    public function showProject(Project $project)
    {
        return Inertia::render('Portfolio/ProjectDetail', [
            'project' => $project->load('techStacks')
        ]);
    }

    public function filterProjects(Request $request)
    {
        $query = Project::with('techStacks');

        if ($request->has('tech_stack')) {
            $query->whereHas('techStacks', function ($query) use ($request) {
                $query->where('tech_stacks.id', $request->tech_stack);
            });
        }

        return Inertia::render('Portfolio/Projects', [
            'projects' => $query->get(),
            'selectedTechStack' => $request->tech_stack
        ]);
    }

    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'projectsCount' => Project::count(),
                'techStacksCount' => TechStack::count(),
                'educationCount' => Education::count(),
                'experienceCount' => WorkExperience::count(),
            ]
        ]);
    }
}