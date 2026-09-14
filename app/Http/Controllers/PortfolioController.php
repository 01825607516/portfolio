<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Contact;

class PortfolioController extends Controller
{
    public function index()
    {
        // Fetch skills grouped by category, fallback to empty array
        $skills = Skill::all()->groupBy('category');
        
        // If no skills in DB, provide dummy data
        if ($skills->isEmpty()) {
            $skills = [
                'Backend' => collect([
                    (object)['name' => 'Laravel', 'icon' => 'fa-solid fa-leaf'],
                    (object)['name' => 'PHP', 'icon' => 'fa-solid fa-code'],
                    (object)['name' => 'Node.js', 'icon' => 'fa-brands fa-node-js'],
                ]),
                'Frontend' => collect([
                    (object)['name' => 'React', 'icon' => 'fa-brands fa-react'],
                    (object)['name' => 'Tailwind', 'icon' => 'fa-solid fa-palette'],
                    (object)['name' => 'JavaScript', 'icon' => 'fa-brands fa-js'],
                ]),
                'Mobile' => collect([
                    (object)['name' => 'Flutter', 'icon' => 'fa-solid fa-mobile'],
                    (object)['name' => 'Dart', 'icon' => 'fa-solid fa-code'],
                ]),
                'Database' => collect([
                    (object)['name' => 'MySQL', 'icon' => 'fa-solid fa-database'],
                    (object)['name' => 'MongoDB', 'icon' => 'fa-solid fa-database'],
                ]),
            ];
        }
        
        // Fetch projects, fallback to empty collection
        $projects = Project::latest()->get();
        
        if ($projects->isEmpty()) {
            $projects = collect([
                (object)[
                    'title' => 'Food Safety Analyzer',
                    'description' => 'AI-powered app to analyze food safety with real-time detection.',
                    'technologies' => ['Flutter', 'AI/ML', 'Python'],
                    'image' => 'images/foodscanner.png',
                    'github_link' => 'https://github.com/01825607516',
                    'live_link' => '#'
                ],
                (object)[
                    'title' => 'Employee Management System',
                    'description' => 'Full-stack web app for managing employee data and records.',
                    'technologies' => ['Laravel', 'React', 'MySQL'],
                    'image' => 'images/employee_system.png',
                    'github_link' => 'https://github.com/01825607516',
                    'live_link' => '#'
                ],
                (object)[
                    'title' => 'Mood Tracker App',
                    'description' => 'Mobile app to track and analyze your daily mood patterns.',
                    'technologies' => ['Flutter', 'Firebase', 'Dart'],
                    'image' => 'images/moodtracker.png',
                    'github_link' => 'https://github.com/01825607516',
                    'live_link' => '#'
                ],
            ]);
        }

        return view('portfolio', compact('skills', 'projects'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
