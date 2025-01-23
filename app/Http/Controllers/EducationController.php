<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EducationController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Education/Index', [
            'educations' => Education::all()->map(function ($edu) {
                return [
                    'id' => $edu->id,
                    'institution' => $edu->institution,
                    'degree' => $edu->degree,
                    'field_of_study' => $edu->field_of_study,
                    'start_date' => $edu->start_date->format('Y-m-d'),
                    'end_date' => $edu->end_date?->format('Y-m-d'),
                    'location' => $edu->location
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Education/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
        ]);

        Education::create($validated);
        return redirect()->route('admin.education.index')->with('success', 'Education added successfully.');
    }

    public function edit(Education $education)
    {
        return Inertia::render('Admin/Education/Edit', [
            'education' => [
                'id' => $education->id,
                'institution' => $education->institution,
                'degree' => $education->degree,
                'field_of_study' => $education->field_of_study,
                'start_date' => $education->start_date->format('Y-m-d'),
                'end_date' => $education->end_date?->format('Y-m-d'),
                'description' => $education->description,
                'location' => $education->location
            ]
        ]);
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
        ]);

        $education->update($validated);
        return redirect()->route('admin.education.index')->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->back()->with('success', 'Education deleted successfully.');
    }
}