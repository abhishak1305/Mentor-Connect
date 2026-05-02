<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MentorConnect - A platform for startups to find and connect with experienced mentors for guidance and growth.">
    <title>@yield('title', 'MentorConnect - Startup Mentorship Platform')</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#EEF2FF',
                            100: '#E0E7FF',
                            200: '#C7D2FE',
                            300: '#A5B4FC',
                            400: '#818CF8',
                            500: '#6366F1',
                            600: '#4F46E5',
                            700: '#4338CA',
                            800: '#3730A3',
                            900: '#312E81',
                        },
                        secondary: '#8B5CF6',
                        accent: '#EC4899',
                        success: '#22C55E',
                        warning: '#F59E0B',
                        surface: '#F9FAFB',
                        heading: '#111827',
                        body: '#6B7280',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        /* Gradient text utility */
        .gradient-text {
            background: linear-gradient(135deg, #6366F1, #8B5CF6, #EC4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Gradient background utility */
        .gradient-bg {
            background: linear-gradient(135deg, #6366F1, #8B5CF6, #EC4899);
        }

        /* Gradient border */
        .gradient-border {
            position: relative;
            background: white;
            border-radius: 1rem;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 1rem;
            background: linear-gradient(135deg, #6366F1, #8B5CF6, #EC4899);
            z-index: -1;
        }

        /* Card hover lift */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Animation keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fade-in-up-delay-1 {
            animation: fadeInUp 0.8s ease-out 0.2s forwards;
            opacity: 0;
        }

        .animate-fade-in-up-delay-2 {
            animation: fadeInUp 0.8s ease-out 0.4s forwards;
            opacity: 0;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Navbar glass effect */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Button shine effect */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        .btn-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to right,
                transparent,
                rgba(255, 255, 255, 0.15),
                transparent
            );
            transform: rotate(45deg);
            transition: all 0.6s;
        }
        .btn-shine:hover::after {
            left: 100%;
        }

        /* Blob decoration */
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        /* Flash message slide-down animation */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        .animate-slide-down {
            animation: slideDown 0.4s ease-out forwards;
        }

        .animate-slide-up {
            animation: slideUp 0.3s ease-in forwards;
        }
    </style>

    @yield('styles')
</head>
<body class="bg-white text-body font-sans antialiased">

    {{-- ========== NAVIGATION ========== --}}
    <nav class="navbar-glass fixed top-0 left-0 right-0 z-50 border-b border-gray-100" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-9 h-9 rounded-xl gradient-bg flex items-center justify-center shadow-lg shadow-primary-500/25 group-hover:shadow-primary-500/40 transition-shadow">
                        <i data-lucide="rocket" class="w-5 h-5 text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-heading">Mentor<span class="gradient-text">Connect</span></span>
                </a>

                {{-- Desktop Navigation --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-heading hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all">Home</a>
                    @if(session('user_role') === 'startup')
                        <a href="{{ route('dashboard.startup') }}" class="px-4 py-2 text-sm font-medium text-body hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all">Dashboard</a>
                        <a href="{{ route('mentors.index') }}" class="px-4 py-2 text-sm font-medium text-body hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all">Browse Mentors</a>
                    @elseif(session('user_role') === 'mentor')
                        <a href="{{ route('dashboard.mentor') }}" class="px-4 py-2 text-sm font-medium text-body hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all">Dashboard</a>
                    @else
                        <a href="#how-it-works" class="px-4 py-2 text-sm font-medium text-body hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all">How It Works</a>
                        <a href="#benefits" class="px-4 py-2 text-sm font-medium text-body hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all">Benefits</a>
                    @endif
                    <a href="{{ route('posts.index') }}" class="px-4 py-2 text-sm font-medium text-body hover:text-primary-600 rounded-lg hover:bg-primary-50 transition-all">Community</a>
                </div>

                {{-- Auth Buttons (Session-based auth check - Unit IV) --}}
                <div class="hidden md:flex items-center gap-3">
                    @if(session('user_id'))
                        {{-- New Post Button --}}
                        <a href="{{ route('posts.index') }}#create-post" class="px-4 py-2 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-xl transition-all shadow-sm flex items-center gap-1.5">
                            <i data-lucide="plus" class="w-4 h-4"></i> Post
                        </a>
                        
                        {{-- Logged In State --}}
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3 py-1.5 bg-surface rounded-xl border border-gray-200 hover:border-primary-300 hover:shadow-sm transition-all group cursor-pointer" title="Edit Profile">
                            <div class="w-7 h-7 rounded-lg gradient-bg flex items-center justify-center group-hover:scale-105 transition-transform">
                                <span class="text-xs font-bold text-white">{{ strtoupper(substr(session('user_name'), 0, 1)) }}</span>
                            </div>
                            <span class="text-sm font-medium text-heading group-hover:text-primary-600 transition-colors">{{ session('user_name') }}</span>
                            <span class="text-xs px-2 py-0.5 rounded-full {{ session('user_role') === 'startup' ? 'bg-primary-50 text-primary-600' : 'bg-pink-50 text-accent' }} font-semibold">{{ ucfirst(session('user_role')) }}</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2.5 text-sm font-semibold text-body hover:text-red-600 hover:bg-red-50 rounded-xl transition-all">
                                <i data-lucide="log-out" class="w-4 h-4 inline"></i> Logout
                            </button>
                        </form>
                    @else
                        {{-- Guest State --}}
                        <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-semibold text-primary-600 hover:text-primary-700 hover:bg-primary-50 rounded-xl transition-all">
                            Log In
                        </a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white gradient-bg rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:scale-105 transition-all btn-shine">
                            Get Started
                        </a>
                    @endif
                </div>

                {{-- Mobile menu button --}}
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-xl text-body hover:text-heading hover:bg-gray-100 transition-all">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="md:hidden hidden border-t border-gray-100 bg-white/95 backdrop-blur-lg">
            <div class="px-4 py-4 space-y-1">
                <a href="{{ route('home') }}" class="block px-4 py-3 text-sm font-medium text-heading hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-all">Home</a>
                <a href="{{ route('posts.index') }}" class="block px-4 py-3 text-sm font-medium text-heading hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-all">Community</a>
                <a href="#how-it-works" class="block px-4 py-3 text-sm font-medium text-body hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-all">How It Works</a>
                <a href="#benefits" class="block px-4 py-3 text-sm font-medium text-body hover:text-primary-600 rounded-xl hover:bg-primary-50 transition-all">Benefits</a>
                <hr class="my-2 border-gray-100">
                @if(session('user_id'))
                    <a href="{{ route('posts.index') }}#create-post" class="flex items-center gap-2 px-4 py-3 text-primary-600 hover:bg-primary-50 rounded-xl transition-all font-semibold text-sm">
                        <i data-lucide="plus" class="w-4 h-4"></i> Create Post
                    </a>
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-3 hover:bg-gray-50 rounded-xl transition-all cursor-pointer" title="Edit Profile">
                        <div class="w-7 h-7 rounded-lg gradient-bg flex items-center justify-center">
                            <span class="text-xs font-bold text-white">{{ strtoupper(substr(session('user_name'), 0, 1)) }}</span>
                        </div>
                        <span class="text-sm font-medium text-heading hover:text-primary-600 transition-colors">{{ session('user_name') }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full {{ session('user_role') === 'startup' ? 'bg-primary-50 text-primary-600' : 'bg-pink-50 text-accent' }} font-semibold">{{ ucfirst(session('user_role')) }}</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-3 text-sm font-medium text-red-600 hover:bg-red-50 rounded-xl transition-all">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-4 py-3 text-sm font-medium text-primary-600 hover:bg-primary-50 rounded-xl transition-all">Log In</a>
                    <a href="{{ route('register') }}" class="block px-4 py-3 text-sm font-semibold text-white gradient-bg rounded-xl text-center shadow-lg">Get Started</a>
                @endif
            </div>
        </div>
    </nav>

    {{-- ========== MAIN CONTENT ========== --}}
    <main class="pt-16 lg:pt-20">

        {{-- ========== FLASH MESSAGES (Unit IV - Session Flash Data) ========== --}}
        @if(session('success'))
            <div class="flash-message max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 animate-slide-down">
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-lg shadow-emerald-100/50" role="alert">
                    <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600"></i>
                    </div>
                    <span class="text-sm font-medium flex-1">{{ session('success') }}</span>
                    <button onclick="this.closest('.flash-message').remove()" class="p-1 rounded-lg hover:bg-emerald-100 transition-colors flex-shrink-0" aria-label="Dismiss">
                        <i data-lucide="x" class="w-4 h-4 text-emerald-400"></i>
                    </button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="flash-message max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 animate-slide-down">
                <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-lg shadow-red-100/50" role="alert">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-600"></i>
                    </div>
                    <span class="text-sm font-medium flex-1">{{ session('error') }}</span>
                    <button onclick="this.closest('.flash-message').remove()" class="p-1 rounded-lg hover:bg-red-100 transition-colors flex-shrink-0" aria-label="Dismiss">
                        <i data-lucide="x" class="w-4 h-4 text-red-400"></i>
                    </button>
                </div>
            </div>
        @endif

        @if(session('warning'))
            <div class="flash-message max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 animate-slide-down">
                <div class="bg-amber-50 border border-amber-200 text-amber-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-lg shadow-amber-100/50" role="alert">
                    <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-600"></i>
                    </div>
                    <span class="text-sm font-medium flex-1">{{ session('warning') }}</span>
                    <button onclick="this.closest('.flash-message').remove()" class="p-1 rounded-lg hover:bg-amber-100 transition-colors flex-shrink-0" aria-label="Dismiss">
                        <i data-lucide="x" class="w-4 h-4 text-amber-400"></i>
                    </button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-heading text-white">
        {{-- Main Footer --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                {{-- Brand --}}
                <div class="lg:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 mb-4">
                        <div class="w-9 h-9 rounded-xl gradient-bg flex items-center justify-center">
                            <i data-lucide="rocket" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-white">MentorConnect</span>
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Empowering startups with the mentorship they need to grow, scale, and succeed.
                    </p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Platform</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Home</a></li>
                        <li><a href="{{ route('mentors.index') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Browse Mentors</a></li>
                        <li><a href="{{ route('register.startup') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Register Startup</a></li>
                        <li><a href="{{ route('register.mentor') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Become a Mentor</a></li>
                    </ul>
                </div>

                {{-- Resources --}}
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Resources</h4>
                    <ul class="space-y-3">
                        <li><a href="#how-it-works" class="text-gray-400 hover:text-white text-sm transition-colors">How It Works</a></li>
                        <li><a href="#benefits" class="text-gray-400 hover:text-white text-sm transition-colors">Benefits</a></li>
                        <li><a href="#categories" class="text-gray-400 hover:text-white text-sm transition-colors">Categories</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Contact</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2 text-gray-400 text-sm">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            support@mentorconnect.com
                        </li>
                        <li class="flex items-center gap-2 text-gray-400 text-sm">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                            Mumbai, India
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} MentorConnect. All rights reserved.</p>
                <p class="text-gray-500 text-sm">Built with <span class="text-accent">&hearts;</span> using Laravel & Tailwind CSS</p>
            </div>
        </div>
    </footer>

    {{-- ========== SCRIPTS ========== --}}
    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Navbar background on scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-sm');
            } else {
                navbar.classList.remove('shadow-sm');
            }
        });

        // Auto-dismiss flash messages after 5 seconds (Unit IV - Flash Data)
        document.querySelectorAll('.flash-message').forEach(function(msg) {
            setTimeout(function() {
                msg.classList.remove('animate-slide-down');
                msg.classList.add('animate-slide-up');
                setTimeout(function() { msg.remove(); }, 300);
            }, 5000);
        });
    </script>

    @yield('scripts')
</body>
</html>
