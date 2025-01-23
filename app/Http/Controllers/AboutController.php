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
            'about' => array_merge($about->toArray(), [
                'social_links' => json_decode($about->social_links, true) ?? [],
            ]),
        ]);
    }

    public function update(Request $request)
    {
        $about = About::first();
        if (!$about) {
            $about = new About();
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'position' => 'required|string|max:255',
            'social_links' => 'array',
            'social_links.github' => 'nullable|url',
            'social_links.linkedin' => 'nullable|url',
        ]);

        $about->update([
            'name' => $validated['name'],
            'bio' => $validated['bio'],
            'position' => $validated['position'],
            'social_links' => json_encode($validated['social_links']),
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }
}