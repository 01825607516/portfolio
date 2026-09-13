 @extends('layouts.app')

@section('content')

    <!-- 1. Header / Navbar -->
    <header x-data="{ open: false }" class="sticky top-0 z-50 backdrop-blur-md bg-slate-900/80 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Custom A+B Monogram Logo -->
                <a href="#" class="flex items-center group">
                    <div class="relative w-10 h-10 flex items-center justify-center rounded-xl bg-slate-800/80 border border-emerald-500/30 group-hover:border-emerald-400 group-hover:shadow-lg group-hover:shadow-emerald-500/20 transition duration-300">
                        <svg class="w-7 h-7 text-emerald-400 group-hover:scale-105 transition duration-300" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="7" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Top Triangle (A Shape) -->
                            <polygon points="50,15 25,52 75,52" />
                            
                            <!-- Inner Diamond Crossline -->
                            <polyline points="38,40 50,55 62,40" />
                            
                            <!-- Bottom Interlocking Loop (B Shape) -->
                            <polyline points="15,68 35,52 50,72 65,52 85,68" />
                            <polyline points="22,78 50,92 78,78" />
                        </svg>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="#about" class="hover:text-emerald-400 transition-colors">About</a>
                    <a href="#skills" class="hover:text-emerald-400 transition-colors">Skills</a>
                    <a href="#projects" class="hover:text-emerald-400 transition-colors">Projects</a>
                    <a href="#contact" class="hover:text-emerald-400 transition-colors">Contact</a>
                </nav>

                <div class="hidden md:block">
                    <a href="#contact" class="px-4 py-2 text-sm font-semibold text-slate-900 bg-emerald-400 rounded-lg hover:bg-emerald-300 transition-colors shadow-lg shadow-emerald-500/20">
                        Hire Me
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button @click="open = !open" class="md:hidden text-slate-400 hover:text-white">
                    <i class="fa-solid" :class="open ? 'fa-xmark text-xl' : 'fa-bars text-xl'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" @click.away="open = false" class="md:hidden bg-slate-800 border-b border-slate-700 px-4 pt-2 pb-4 space-y-3">
            <a href="#about" @click="open = false" class="block hover:text-emerald-400 py-1">About</a>
            <a href="#skills" @click="open = false" class="block hover:text-emerald-400 py-1">Skills</a>
            <a href="#projects" @click="open = false" class="block hover:text-emerald-400 py-1">Projects</a>
            <a href="#contact" @click="open = false" class="block hover:text-emerald-400 py-1">Contact</a>
        </div>
    </header>

    <!-- 2. Hero Section -->
    <section class="py-20 md:py-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
            <div class="md:col-span-7 space-y-6">
                <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-mono">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Available for work & opportunities</span>
                </div>
                
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight">
                    Hi, I'm <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-200">Amina Begum</span>
                </h1>
                
                <p class="font-mono text-lg text-emerald-400 font-medium">
                    &lt;Full-Stack & Mobile App Developer /&gt;
                </p>

                <p class="text-slate-400 text-base leading-relaxed max-w-2xl">
                    Driven Software Engineering student with hands-on experience building scalable web, mobile, and AI-powered applications using Laravel, React, Node.js, and Flutter. Proactive problem-solver eager to build innovative software solutions.
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#projects" class="px-6 py-3 font-semibold text-slate-900 bg-emerald-400 rounded-lg hover:bg-emerald-300 transition shadow-lg shadow-emerald-500/20">
                        View Projects
                    </a>
                    <a href="{{ asset('resume.pdf') }}" download="Amina_Begum_Resume.pdf" class="px-6 py-3 font-semibold text-slate-200 bg-slate-800 border border-slate-700 rounded-lg hover:bg-slate-700 transition flex items-center gap-2">
                        <i class="fa-solid fa-download"></i> Download CV
                    </a>
                </div>
            </div>

            <!-- Profile Image -->
            <div class="md:col-span-5 flex justify-center">
                <div class="relative w-64 h-64 sm:w-80 sm:h-80 rounded-2xl overflow-hidden border-2 border-emerald-500/30 p-2 bg-slate-800/50 shadow-2xl">
                    <img src="{{ asset('images/profile.jpg') }}" onerror="this.src='https://ui-avatars.com/api/?name=Amina+Begum&background=1e293b&color=22c55e&size=400'" alt="Amina Begum" class="w-full h-full object-cover rounded-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Marquee Ticker Banner -->
    <div class="py-4 bg-slate-800/60 border-y border-slate-800 overflow-hidden font-mono text-sm">
        <div class="animate-marquee whitespace-nowrap text-emerald-400/80 flex space-x-8">
            <span>• Laravel Development</span>
            <span>• React.js & Node.js</span>
            <span>• Flutter Mobile Apps</span>
            <span>• MySQL & MongoDB</span>
            <span>• RESTful APIs Integration</span>
            <span>• AI-Powered Solutions</span>
            <span>• Clean & Scalable Code</span>
            <!-- Duplicate for infinite scroll loop -->
            <span>• Laravel Development</span>
            <span>• React.js & Node.js</span>
            <span>• Flutter Mobile Apps</span>
            <span>• MySQL & MongoDB</span>
            <span>• RESTful APIs Integration</span>
        </div>
    </div>

    <!-- 4. About & Stats Section -->
    <section id="about" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-slate-800/40 border border-slate-800 hover:border-emerald-500/30 transition">
                <div class="text-3xl font-extrabold text-emerald-400 font-mono mb-2">B.Sc.</div>
                <div class="text-slate-200 font-semibold mb-1">Software Engineering</div>
                <p class="text-slate-400 text-sm">Metropolitan University, Sylhet (2023 - Present)</p>
            </div>
            
            <div class="p-6 rounded-2xl bg-slate-800/40 border border-slate-800 hover:border-emerald-500/30 transition">
                <div class="text-3xl font-extrabold text-emerald-400 font-mono mb-2">3+</div>
                <div class="text-slate-200 font-semibold mb-1">Featured Projects</div>
                <p class="text-slate-400 text-sm">Web, Mobile App & AI-driven food safety analyzer.</p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-800/40 border border-slate-800 hover:border-emerald-500/30 transition">
                <div class="text-3xl font-extrabold text-emerald-400 font-mono mb-2">Full-Stack</div>
                <div class="text-slate-200 font-semibold mb-1">Modern Tech Stack</div>
                <p class="text-slate-400 text-sm">Expertise in PHP, JS, Dart & Cross-platform framework.</p>
            </div>
        </div>
    </section>

    <!-- 5. Skills Badges Section (Single Merged Tools Card) -->
    <section id="skills" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8 flex items-center gap-3">
            <span class="text-emerald-400 font-mono text-xl">01.</span> Technical Skills
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($skills as $category => $categorySkills)
                @if(!in_array(strtolower($category), ['tools', 'tools & software']))
                    <div class="p-6 rounded-2xl bg-slate-800/30 border border-slate-800">
                        <h3 class="text-emerald-400 font-mono text-sm uppercase font-semibold tracking-wider mb-4">{{ $category }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($categorySkills as $skill)
                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-300 text-xs font-medium hover:border-emerald-500/50 hover:text-white transition">
                                    <i class="{{ $skill->icon }} text-emerald-400"></i>
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Consolidated Single Tools & Software Card -->
            <div class="p-6 rounded-2xl bg-slate-800/30 border border-slate-800">
                <h3 class="text-emerald-400 font-mono text-sm uppercase font-semibold tracking-wider mb-4">Tools & Software</h3>
                <div class="flex flex-wrap gap-2">
                    <!-- DB Skills dynamically rendered if exists under 'Tools' or 'Tools & Software' -->
                    @foreach($skills as $category => $categorySkills)
                        @if(in_array(strtolower($category), ['tools', 'tools & software']))
                            @foreach($categorySkills as $skill)
                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-300 text-xs font-medium hover:border-emerald-500/50 hover:text-white transition">
                                    <i class="{{ $skill->icon }} text-emerald-400"></i>
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Static Tools -->
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-300 text-xs font-medium hover:border-emerald-500/50 hover:text-white transition">
                        <i class="fa-solid fa-code text-emerald-400"></i> VS Code
                    </span>
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-300 text-xs font-medium hover:border-emerald-500/50 hover:text-white transition">
                        <i class="fa-solid fa-server text-emerald-400"></i> XAMPP
                    </span>
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-300 text-xs font-medium hover:border-emerald-500/50 hover:text-white transition">
                        <i class="fa-brands fa-git-alt text-emerald-400"></i> Git
                    </span>
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-300 text-xs font-medium hover:border-emerald-500/50 hover:text-white transition">
                        <i class="fa-brands fa-github text-emerald-400"></i> GitHub
                    </span>
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-300 text-xs font-medium hover:border-emerald-500/50 hover:text-white transition">
                        <i class="fa-solid fa-paper-plane text-emerald-400"></i> Postman
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Projects Showcase Section -->
    <section id="projects" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-10 flex items-center gap-3">
            <span class="text-emerald-400 font-mono text-xl">02.</span> Projects
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div class="group rounded-2xl bg-slate-800/40 border border-slate-800 overflow-hidden hover:border-emerald-500/40 transition flex flex-col">
                    <div class="h-48 bg-slate-900 relative overflow-hidden flex items-center justify-center">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="text-center p-4">
                                <i class="fa-solid fa-code text-4xl text-emerald-400/40 mb-2"></i>
                                <p class="text-xs font-mono text-slate-500">{{ $project->title }}</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="text-xl font-bold text-slate-100 group-hover:text-emerald-400 transition">{{ $project->title }}</h3>
                            <p class="text-slate-400 text-sm mt-2 leading-relaxed">{{ $project->description }}</p>
                        </div>

                        <div>
                            <div class="flex flex-wrap gap-2 my-4">
                                @if($project->technologies)
                                    @foreach($project->technologies as $tech)
                                        <span class="text-[11px] font-mono px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>

                            <div class="flex items-center space-x-4 pt-2 border-t border-slate-800 text-sm">
                                @if($project->github_link)
                                    <a href="{{ $project->github_link }}" target="_blank" class="text-slate-400 hover:text-emerald-400 transition flex items-center gap-1">
                                        <i class="fa-brands fa-github"></i> Code
                                    </a>
                                @endif
                                @if($project->live_link && $project->live_link != '#')
                                    <a href="{{ $project->live_link }}" target="_blank" class="text-slate-400 hover:text-emerald-400 transition flex items-center gap-1">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 7. Contact Form & Footer -->
    <section id="contact" class="py-20 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-8 md:p-12 rounded-3xl bg-slate-800/30 border border-slate-800">
            <h2 class="text-3xl font-bold text-center mb-2">Get In Touch</h2>
            <p class="text-slate-400 text-center text-sm mb-8">Have a question or want to work together? Send me a message!</p>

            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-mono text-slate-400 mb-1">Your Name</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-200 focus:outline-none focus:border-emerald-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-mono text-slate-400 mb-1">Your Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-200 focus:outline-none focus:border-emerald-400 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-mono text-slate-400 mb-1">Message</label>
                    <textarea name="message" rows="4" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-200 focus:outline-none focus:border-emerald-400 text-sm"></textarea>
                </div>
                <button type="submit" class="w-full py-3.5 font-semibold text-slate-900 bg-emerald-400 rounded-xl hover:bg-emerald-300 transition shadow-lg shadow-emerald-500/20">
                    Send Message
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 border-t border-slate-800 text-center text-xs text-slate-500">
        <div class="flex justify-center space-x-6 mb-4 text-base text-slate-400">
            <a href="https://github.com/01825607516" target="_blank" class="hover:text-emerald-400"><i class="fa-brands fa-github"></i></a>
            <a href="https://www.linkedin.com/in/amina-begum-803b8a424/" target="_blank" class="hover:text-emerald-400"><i class="fa-brands fa-linkedin"></i></a>
            <a href="mailto:aminabegum0065@gmail.com" class="hover:text-emerald-400"><i class="fa-solid fa-envelope"></i></a>
        </div>
        <p>© {{ date('Y') }} Amina Begum. Designed & Developed with Laravel + Tailwind CSS.</p>
    </footer>

@endsection