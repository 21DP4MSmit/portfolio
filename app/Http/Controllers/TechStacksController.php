<?php

namespace App\Http\Controllers;

use App\Models\TechStack;
use Illuminate\Http\Request;

class TechStacksController extends Controller
{
    public function index()
    {
        return TechStack::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'proficiency' => 'required|integer|min:1|max:100',
            'category' => 'required|string|max:255',
        ]);

        TechStack::create($validated);

        return redirect()->back()->with('success', 'Tech stack created successfully');
    }

    public function update(Request $request, TechStack $techStack)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'proficiency' => 'required|integer|min:1|max:100',
            'category' => 'required|string|max:255',
        ]);

        $techStack->update($validated);

        return redirect()->back()->with('success', 'Tech stack updated successfully');
    }

    public function destroy(TechStack $techStack)
    {
        $techStack->delete();
        return redirect()->back()->with('success', 'Tech stack deleted successfully');
    }
}
