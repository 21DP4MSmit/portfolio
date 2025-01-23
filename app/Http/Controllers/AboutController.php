<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return Inertia::render('Admin/Forms/AboutForm', [
            'about' => $about,
        ]);
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'social_links' => 'nullable|array'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('about', 'public');
            $validated['photo'] = $path;
        }

        $about->update($validated);

        return redirect()->back()->with('success', 'About updated');
    }
}