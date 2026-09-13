@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-8 border-b border-slate-800 pb-4">
        <h1 class="text-3xl font-bold text-emerald-400 font-mono">Admin Dashboard</h1>
        <a href="{{ route('portfolio') }}" target="_blank" class="text-sm px-4 py-2 bg-slate-800 hover:bg-slate-700 rounded-lg border border-slate-700">
            View Live Site <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-xs"></i>
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Add New Project Form -->
        <div class="lg:col-span-5 bg-slate-800/40 p-6 rounded-2xl border border-slate-800">
            <h2 class="text-xl font-bold mb-4 text-slate-200">Add New Project</h2>
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-mono text-slate-400 mb-1">Project Title</label>
                    <input type="text" name="title" required class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-700 text-sm text-slate-200 focus:outline-none focus:border-emerald-400">
                </div>
                <div>
                    <label class="block text-xs font-mono text-slate-400 mb-1">Description</label>
                    <textarea name="description" rows="3" required class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-700 text-sm text-slate-200 focus:outline-none focus:border-emerald-400"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-mono text-slate-400 mb-1">Technologies (Comma separated)</label>
                    <input type="text" name="technologies" placeholder="Laravel, Vue.js, MySQL" required class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-700 text-sm text-slate-200 focus:outline-none focus:border-emerald-400">
                </div>
                <div>
                    <label class="block text-xs font-mono text-slate-400 mb-1">Project Image</label>
                    <input type="file" name="image" class="w-full text-xs text-slate-400 border border-slate-700 rounded-lg bg-slate-900 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:bg-slate-800 file:text-slate-300">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-mono text-slate-400 mb-1">GitHub URL</label>
                        <input type="url" name="github_link" class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-700 text-sm text-slate-200 focus:outline-none focus:border-emerald-400">
                    </div>
                    <div>
                        <label class="block text-xs font-mono text-slate-400 mb-1">Live Demo URL</label>
                        <input type="url" name="live_link" class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-700 text-sm text-slate-200 focus:outline-none focus:border-emerald-400">
                    </div>
                </div>
                <button type="submit" class="w-full py-2.5 font-semibold text-slate-900 bg-emerald-400 rounded-lg hover:bg-emerald-300 transition">
                    Save Project
                </button>
            </form>
        </div>

        <!-- Manage Projects & View Messages -->
        <div class="lg:col-span-7 space-y-8">
            <!-- Project List -->
            <div class="bg-slate-800/40 p-6 rounded-2xl border border-slate-800">
                <h2 class="text-xl font-bold mb-4 text-slate-200">Manage Projects ({{ $projects->count() }})</h2>
                <div class="space-y-3 max-h-80 overflow-y-auto">
                    @foreach($projects as $project)
                        <div class="flex items-center justify-between p-3 bg-slate-900 rounded-xl border border-slate-800">
                            <div>
                                <h4 class="font-bold text-slate-200 text-sm">{{ $project->title }}</h4>
                                <span class="text-xs text-slate-500 font-mono">{{ implode(', ', $project->technologies ?? []) }}</span>
                            </div>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-rose-400 hover:text-rose-300 text-xs px-3 py-1 bg-rose-500/10 rounded-lg border border-rose-500/20">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Contact Messages -->
            <div class="bg-slate-800/40 p-6 rounded-2xl border border-slate-800">
                <h2 class="text-xl font-bold mb-4 text-slate-200">Contact Messages ({{ $contacts->count() }})</h2>
                <div class="space-y-3 max-h-80 overflow-y-auto">
                    @forelse($contacts as $contact)
                        <div class="p-3 bg-slate-900 rounded-xl border border-slate-800 space-y-1">
                            <div class="flex justify-between items-center text-xs">
                                <span class="font-bold text-emerald-400">{{ $contact->name }} ({{ $contact->email }})</span>
                                <span class="text-slate-500 font-mono">{{ $contact->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-xs text-slate-300">{{ $contact->message }}</p>
                        </div>
                    @empty
                        <p class="text-xs text-slate-500">No messages received yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection