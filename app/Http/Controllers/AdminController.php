<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Admin Dashboard / Project List
    public function index()
    {
        $projects = Project::latest()->get();
        $contacts = Contact::latest()->get();
        return view('admin.dashboard', compact('projects', 'contacts'));
    }

    // Save New Project
    public function storeProject(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'technologies' => 'required|string', // Comma separated e.g. Laravel, React
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Unique name format: timestamp_filename.png
            $imagePath = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('', $imagePath, 'public');
        }

        // Convert comma-separated string to array
        $techArray = array_map('trim', explode(',', $request->technologies));

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'technologies' => $techArray,
            'github_link' => $request->github_link,
            'live_link' => $request->live_link,
        ]);

        return back()->with('success', 'Project added successfully!');
    }

    // Delete Project
    public function destroyProject(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return back()->with('success', 'Project deleted successfully!');
    }
}