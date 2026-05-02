@extends('layouts.app')

@section('title', 'MentorConnect - Empowering Startups with Expert Mentorship')

@section('content')

    {{-- ========== HERO SECTION ========== --}}
    <section class="relative overflow-hidden bg-white min-h-[90vh] flex items-center" id="hero">
        {{-- Background decorations --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary-100/40 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 -left-32 w-80 h-80 bg-purple-100/40 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-pink-100/30 rounded-full blur-3xl"></div>
            {{-- Dot pattern --}}
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, #6366F1 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 relative">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                {{-- Left: Text Content --}}
                <div class="animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 rounded-full mb-6">
                        <span class="w-2 h-2 rounded-full bg-success animate-pulse"></span>
                        <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Now Connecting Startups & Mentors</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-heading leading-tight mb-6">
                        Find the Right
                        <span class="gradient-text block">Mentor</span>
                        for Your Startup
                    </h1>

                    <p class="text-lg text-body leading-relaxed mb-8 max-w-xl">
                        Connect with experienced industry mentors who can guide your startup journey.
                        Get personalized advice, strategic insights, and the support you need to grow.
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-wrap gap-4 mb-10">
                        <a href="{{ route('mentors.index') }}" class="inline-flex items-center gap-2 px-8 py-4 text-white font-semibold gradient-bg rounded-2xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:scale-105 transition-all btn-shine">
                            <i data-lucide="search" class="w-5 h-5"></i>
                            Find a Mentor
                        </a>
                        <a href="{{ route('register.startup') }}" class="inline-flex items-center gap-2 px-8 py-4 text-primary-600 font-semibold bg-white border-2 border-primary-200 rounded-2xl hover:border-primary-400 hover:bg-primary-50 transition-all">
                            <i data-lucide="building-2" class="w-5 h-5"></i>
                            Register Startup
                        </a>
                    </div>

                    {{-- Stats --}}
                    <div class="flex items-center gap-8">
                        <div>
                            <div class="text-2xl font-bold text-heading">50+</div>
                            <div class="text-xs text-body font-medium">Expert Mentors</div>
                        </div>
                        <div class="w-px h-10 bg-gray-200"></div>
                        <div>
                            <div class="text-2xl font-bold text-heading">120+</div>
                            <div class="text-xs text-body font-medium">Startups Helped</div>
                        </div>
                        <div class="w-px h-10 bg-gray-200"></div>
                        <div>
                            <div class="text-2xl font-bold text-heading">10+</div>
                            <div class="text-xs text-body font-medium">Categories</div>
                        </div>
                    </div>
                </div>

                {{-- Right: Hero Visual --}}
                <div class="hidden lg:block animate-fade-in-up-delay-1">
                    <div class="relative">
                        {{-- Main Card --}}
                        <div class="bg-white rounded-3xl shadow-2xl shadow-primary-500/10 p-8 border border-gray-100">
                            {{-- Header --}}
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-2xl gradient-bg flex items-center justify-center shadow-lg shadow-primary-500/25">
                                        <i data-lucide="users" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-heading">Mentor Match</div>
                                        <div class="text-xs text-body">Top recommendations</div>
                                    </div>
                                </div>
                                <div class="px-3 py-1.5 bg-green-50 text-success text-xs font-semibold rounded-full">Active</div>
                            </div>

                            {{-- Sample Mentor Cards --}}
                            <div class="space-y-4">
                                <div class="flex items-center gap-4 p-4 bg-surface rounded-2xl border border-gray-100 card-hover cursor-pointer">
                                    <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="code-2" class="w-6 h-6 text-primary-600"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-semibold text-heading">Rahul Sharma</div>
                                        <div class="text-xs text-body">Tech Strategy • 12 yrs exp</div>
                                    </div>
                                    <div class="px-2.5 py-1 bg-primary-50 text-primary-600 text-xs font-semibold rounded-lg">Connect</div>
                                </div>

                                <div class="flex items-center gap-4 p-4 bg-surface rounded-2xl border border-gray-100 card-hover cursor-pointer">
                                    <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="trending-up" class="w-6 h-6 text-secondary"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-semibold text-heading">Priya Patel</div>
                                        <div class="text-xs text-body">Business Growth • 8 yrs exp</div>
                                    </div>
                                    <div class="px-2.5 py-1 bg-purple-50 text-secondary text-xs font-semibold rounded-lg">Connect</div>
                                </div>

                                <div class="flex items-center gap-4 p-4 bg-surface rounded-2xl border border-gray-100 card-hover cursor-pointer">
                                    <div class="w-12 h-12 rounded-xl bg-pink-100 flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="palette" class="w-6 h-6 text-accent"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-semibold text-heading">Arjun Mehra</div>
                                        <div class="text-xs text-body">Product Design • 6 yrs exp</div>
                                    </div>
                                    <div class="px-2.5 py-1 bg-pink-50 text-accent text-xs font-semibold rounded-lg">Connect</div>
                                </div>
                            </div>
                        </div>

                        {{-- Floating badge --}}
                        <div class="absolute -top-4 -right-4 bg-white rounded-2xl shadow-xl p-4 border border-gray-100 animate-float">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center">
                                    <i data-lucide="check-circle-2" class="w-5 h-5 text-success"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-heading">Request Sent!</div>
                                    <div class="text-[10px] text-body">Just now</div>
                                </div>
                            </div>
                        </div>

                        {{-- Floating stats badge --}}
                        <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl shadow-xl p-4 border border-gray-100 animate-float" style="animation-delay: 1.5s;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-primary-50 flex items-center justify-center">
                                    <i data-lucide="star" class="w-5 h-5 text-warning"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-heading">4.9 Rating</div>
                                    <div class="text-[10px] text-body">From 200+ reviews</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== TRUSTED BY SECTION ========== --}}
    <section class="bg-surface border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <p class="text-center text-xs font-semibold text-body uppercase tracking-widest mb-8">Mentorship categories available</p>
            <div class="flex flex-wrap justify-center gap-4">
                @php
                    $categories = ['Technology', 'Marketing', 'Finance', 'Product Design', 'Operations', 'Legal', 'Sales', 'HR & Culture'];
                @endphp
                @foreach($categories as $category)
                    <span class="px-5 py-2.5 bg-white text-sm font-medium text-body rounded-xl border border-gray-200 hover:border-primary-300 hover:text-primary-600 hover:bg-primary-50 transition-all cursor-pointer">
                        {{ $category }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========== HOW IT WORKS ========== --}}
    <section class="bg-white py-20 lg:py-28" id="how-it-works">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 rounded-full mb-4">
                    <i data-lucide="layers" class="w-4 h-4 text-primary-600"></i>
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Simple Process</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-heading mb-4">
                    How <span class="gradient-text">MentorConnect</span> Works
                </h2>
                <p class="text-body leading-relaxed">
                    Getting started is easy. Follow these simple steps to connect with the right mentor for your startup.
                </p>
            </div>

            {{-- Steps --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Step 1 --}}
                <div class="text-center group">
                    <div class="relative inline-flex mb-6">
                        <div class="w-20 h-20 rounded-2xl bg-primary-50 flex items-center justify-center group-hover:bg-primary-100 transition-colors">
                            <i data-lucide="user-plus" class="w-9 h-9 text-primary-600"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white text-sm font-bold shadow-lg">1</div>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-2">Register</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Sign up as a startup or mentor. Fill in your details and create your profile on the platform.
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="text-center group">
                    <div class="relative inline-flex mb-6">
                        <div class="w-20 h-20 rounded-2xl bg-purple-50 flex items-center justify-center group-hover:bg-purple-100 transition-colors">
                            <i data-lucide="search" class="w-9 h-9 text-secondary"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white text-sm font-bold shadow-lg">2</div>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-2">Browse Mentors</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Explore our curated list of mentors. Filter by category, expertise, and years of experience.
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="text-center group">
                    <div class="relative inline-flex mb-6">
                        <div class="w-20 h-20 rounded-2xl bg-pink-50 flex items-center justify-center group-hover:bg-pink-100 transition-colors">
                            <i data-lucide="send" class="w-9 h-9 text-accent"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white text-sm font-bold shadow-lg">3</div>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-2">Send Request</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Found the right match? Send a mentorship request with your goals and what you need help with.
                    </p>
                </div>

                {{-- Step 4 --}}
                <div class="text-center group">
                    <div class="relative inline-flex mb-6">
                        <div class="w-20 h-20 rounded-2xl bg-green-50 flex items-center justify-center group-hover:bg-green-100 transition-colors">
                            <i data-lucide="handshake" class="w-9 h-9 text-success"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white text-sm font-bold shadow-lg">4</div>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-2">Get Mentored</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Once connected, receive guidance, feedback, and strategic advice to accelerate your growth.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== BENEFITS SECTION ========== --}}
    <section class="bg-surface py-20 lg:py-28" id="benefits">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 rounded-full mb-4">
                    <i data-lucide="sparkles" class="w-4 h-4 text-primary-600"></i>
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Why Choose Us</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-heading mb-4">
                    Why Startups Need <span class="gradient-text">Mentorship</span>
                </h2>
                <p class="text-body leading-relaxed">
                    Studies show that startups with mentors grow faster, raise more funding, and are more likely to succeed.
                </p>
            </div>

            {{-- Benefits Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Benefit 1 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover group">
                    <div class="w-14 h-14 rounded-2xl bg-primary-50 flex items-center justify-center mb-6 group-hover:bg-primary-100 transition-colors">
                        <i data-lucide="compass" class="w-7 h-7 text-primary-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-3">Strategic Direction</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Get clarity on your vision, market positioning, and growth strategy from mentors who have been there before.
                    </p>
                </div>

                {{-- Benefit 2 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover group">
                    <div class="w-14 h-14 rounded-2xl bg-purple-50 flex items-center justify-center mb-6 group-hover:bg-purple-100 transition-colors">
                        <i data-lucide="network" class="w-7 h-7 text-secondary"></i>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-3">Industry Network</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Tap into your mentor's network of investors, partners, and industry connections to accelerate opportunities.
                    </p>
                </div>

                {{-- Benefit 3 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover group">
                    <div class="w-14 h-14 rounded-2xl bg-pink-50 flex items-center justify-center mb-6 group-hover:bg-pink-100 transition-colors">
                        <i data-lucide="shield-check" class="w-7 h-7 text-accent"></i>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-3">Avoid Costly Mistakes</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Learn from your mentor's experience and avoid common pitfalls that can set your startup back months.
                    </p>
                </div>

                {{-- Benefit 4 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover group">
                    <div class="w-14 h-14 rounded-2xl bg-green-50 flex items-center justify-center mb-6 group-hover:bg-green-100 transition-colors">
                        <i data-lucide="rocket" class="w-7 h-7 text-success"></i>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-3">Faster Growth</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Mentored startups grow 3.5x faster and raise 7x more funding compared to non-mentored startups.
                    </p>
                </div>

                {{-- Benefit 5 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover group">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center mb-6 group-hover:bg-amber-100 transition-colors">
                        <i data-lucide="lightbulb" class="w-7 h-7 text-warning"></i>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-3">Fresh Perspectives</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Get an outside perspective on your challenges and opportunities that you might not see from within.
                    </p>
                </div>

                {{-- Benefit 6 --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover group">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center mb-6 group-hover:bg-indigo-100 transition-colors">
                        <i data-lucide="heart-handshake" class="w-7 h-7 text-primary-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-heading mb-3">Accountability Partner</h3>
                    <p class="text-sm text-body leading-relaxed">
                        Stay on track with regular check-ins and an accountability partner who cares about your success.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ========== CATEGORIES SECTION ========== --}}
    <section class="bg-white py-20 lg:py-28" id="categories">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 rounded-full mb-4">
                    <i data-lucide="grid-3x3" class="w-4 h-4 text-primary-600"></i>
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Explore Categories</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-heading mb-4">
                    Find Mentors by <span class="gradient-text">Expertise</span>
                </h2>
                <p class="text-body leading-relaxed">
                    Browse our diverse range of mentorship categories to find the perfect match for your startup's needs.
                </p>
            </div>

            {{-- Categories Grid --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $categoryData = [
                        ['name' => 'Technology', 'icon' => 'code-2', 'color' => 'primary', 'count' => '12 Mentors'],
                        ['name' => 'Marketing', 'icon' => 'megaphone', 'color' => 'purple', 'count' => '8 Mentors'],
                        ['name' => 'Finance', 'icon' => 'indian-rupee', 'color' => 'green', 'count' => '6 Mentors'],
                        ['name' => 'Product Design', 'icon' => 'palette', 'color' => 'pink', 'count' => '9 Mentors'],
                        ['name' => 'Operations', 'icon' => 'settings', 'color' => 'amber', 'count' => '5 Mentors'],
                        ['name' => 'Legal', 'icon' => 'scale', 'color' => 'indigo', 'count' => '4 Mentors'],
                        ['name' => 'Sales', 'icon' => 'bar-chart-3', 'color' => 'emerald', 'count' => '7 Mentors'],
                        ['name' => 'HR & Culture', 'icon' => 'heart', 'color' => 'rose', 'count' => '5 Mentors'],
                    ];
                @endphp

                @foreach($categoryData as $cat)
                    <a href="#" class="bg-surface rounded-2xl p-6 border border-gray-100 card-hover group text-center block">
                        <div class="w-14 h-14 rounded-2xl bg-{{ $cat['color'] }}-50 flex items-center justify-center mx-auto mb-4 group-hover:bg-{{ $cat['color'] }}-100 transition-colors">
                            <i data-lucide="{{ $cat['icon'] }}" class="w-7 h-7 text-{{ $cat['color'] }}-600"></i>
                        </div>
                        <h3 class="text-sm font-bold text-heading mb-1">{{ $cat['name'] }}</h3>
                        <p class="text-xs text-body">{{ $cat['count'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========== CTA SECTION ========== --}}
    <section class="relative overflow-hidden py-20 lg:py-28">
        {{-- Gradient Background --}}
        <div class="absolute inset-0 gradient-bg"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 30px 30px;"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6">
                Ready to Accelerate Your Startup?
            </h2>
            <p class="text-lg text-white/80 leading-relaxed mb-10 max-w-2xl mx-auto">
                Join our growing community of startups and mentors. Whether you need guidance or want to give back, there's a place for you here.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('register.startup') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-primary-600 font-semibold rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                    <i data-lucide="building-2" class="w-5 h-5"></i>
                    Register as Startup
                </a>
                <a href="{{ route('register.mentor') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 text-white font-semibold rounded-2xl border-2 border-white/30 hover:bg-white/20 transition-all backdrop-blur-sm">
                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                    Become a Mentor
                </a>
            </div>

            {{-- Trust indicators --}}
            <div class="flex flex-wrap justify-center items-center gap-6 mt-12">
                <div class="flex items-center gap-2 text-white/70 text-sm">
                    <i data-lucide="check" class="w-4 h-4 text-white"></i>
                    Free to Register
                </div>
                <div class="flex items-center gap-2 text-white/70 text-sm">
                    <i data-lucide="check" class="w-4 h-4 text-white"></i>
                    Verified Mentors
                </div>
                <div class="flex items-center gap-2 text-white/70 text-sm">
                    <i data-lucide="check" class="w-4 h-4 text-white"></i>
                    No Hidden Charges
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    // Re-initialize icons for dynamically rendered content
    lucide.createIcons();
</script>
@endsection
