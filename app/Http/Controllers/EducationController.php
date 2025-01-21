<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EducationController extends Controller
{
    public function index()
    {
        return Education::orderBy('end_date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255'
        ]);

        Education::create($validated);

        return redirect()->back()->with('success', 'Education created successfully');
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255'
        ]);

        $education->update($validated);

        return redirect()->back()->with('success', 'Education updated successfully');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->back()->with('success', 'Education deleted successfully');
    }
}