<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::firstOrNew();
        return Inertia::render('Admin/Forms/AboutForm', [
            'about' => $about->toArray()
        ]);
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'position' => 'required|string|max:255',
            'social_links' => 'array',
            'social_links.github' => 'nullable|url',
            'social_links.linkedin' => 'nullable|url'
        ]);

        $about->update([
            'name' => $validated['name'],
            'bio' => $validated['bio'],
            'position' => $validated['position'],
            'social_links' => $validated['social_links']
        ]);

        return back();
    }
}