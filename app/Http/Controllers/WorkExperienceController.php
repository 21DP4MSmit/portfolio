<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkExperienceController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/WorkExperience/Index', [
            'experiences' => WorkExperience::all()->map(function ($exp) {
                return [
                    'id' => $exp->id,
                    'company' => $exp->company,
                    'position' => $exp->position,
                    'start_date' => $exp->start_date->format('Y-m-d'),
                    'end_date' => $exp->end_date?->format('Y-m-d'),
                    'location' => $exp->location,
                    'is_current' => $exp->is_current
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/WorkExperience/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'is_current' => 'sometimes|boolean',
        ]);

        if ($request->is_current) {
            $validated['end_date'] = null;
        }

        WorkExperience::create($validated);
        return redirect()->route('admin.experience.index')->with('success', 'Work experience added successfully.');
    }

    public function edit(WorkExperience $experience)
    {
        return Inertia::render('Admin/WorkExperience/Edit', [
            'experience' => [
                'id' => $experience->id,
                'company' => $experience->company,
                'position' => $experience->position,
                'start_date' => $experience->start_date->format('Y-m-d'),
                'end_date' => $experience->end_date?->format('Y-m-d'),
                'description' => $experience->description,
                'location' => $experience->location,
                'is_current' => $experience->is_current
            ]
        ]);
    }

    public function update(Request $request, WorkExperience $experience)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'is_current' => 'sometimes|boolean',
        ]);

        if ($request->is_current) {
            $validated['end_date'] = null;
        }

        $experience->update($validated);
        return redirect()->route('admin.experience.index')->with('success', 'Work experience updated successfully.');
    }

    public function destroy(WorkExperience $experience)
    {
        $experience->delete();
        return redirect()->back()->with('success', 'Work experience deleted successfully.');
    }
}