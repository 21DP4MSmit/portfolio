<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkExperienceController extends Controller
{
    public function index()
    {
        return WorkExperience::orderBy('start_date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'is_current' => 'boolean'
        ]);

        WorkExperience::create($validated);

        return redirect()->back()->with('success', 'Work experience created successfully');
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'is_current' => 'boolean'
        ]);

        $workExperience->update($validated);

        return redirect()->back()->with('success', 'Work experience updated successfully');
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return redirect()->back()->with('success', 'Work experience deleted successfully');
    }
}