@extends('layouts.app')

@section('title', 'Register - Choose Your Role | MentorConnect')

@section('content')

    <section class="relative overflow-hidden min-h-[85vh] flex items-center bg-white">
        {{-- Background decorations --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-32 -right-32 w-80 h-80 bg-primary-100/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 -left-32 w-72 h-72 bg-purple-100/30 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, #6366F1 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative w-full">
            {{-- Header --}}
            <div class="text-center mb-12 animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 rounded-full mb-4">
                    <i data-lucide="user-plus" class="w-4 h-4 text-primary-600"></i>
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Join MentorConnect</span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-bold text-heading mb-3">
                    How would you like to <span class="gradient-text">join?</span>
                </h1>
                <p class="text-body max-w-lg mx-auto">
                    Select your role to get started. You can register as a startup seeking mentorship or as an experienced mentor ready to guide.
                </p>
            </div>

            {{-- Role Selection Cards --}}
            <div class="grid md:grid-cols-2 gap-8 max-w-3xl mx-auto animate-fade-in-up-delay-1">
                {{-- Startup Card --}}
                <a href="{{ route('register.startup') }}" class="group block">
                    <div class="bg-white rounded-2xl p-8 border-2 border-gray-100 card-hover text-center relative overflow-hidden group-hover:border-primary-300 transition-all">
                        {{-- Decorative gradient on hover --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-50/0 to-purple-50/0 group-hover:from-primary-50/50 group-hover:to-purple-50/50 transition-all"></div>

                        <div class="relative">
                            {{-- Icon --}}
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-primary-500 to-secondary mx-auto mb-6 flex items-center justify-center shadow-lg shadow-primary-500/25 group-hover:shadow-primary-500/40 group-hover:scale-110 transition-all">
                                <i data-lucide="building-2" class="w-10 h-10 text-white"></i>
                            </div>

                            {{-- Title --}}
                            <h2 class="text-xl font-bold text-heading mb-3">I'm a Startup</h2>

                            {{-- Description --}}
                            <p class="text-sm text-body leading-relaxed mb-6">
                                Looking for experienced mentors to guide your startup journey? Register to browse and connect with mentors.
                            </p>

                            {{-- Features --}}
                            <ul class="space-y-2 text-left mb-6">
                                <li class="flex items-center gap-2 text-sm text-body">
                                    <i data-lucide="check" class="w-4 h-4 text-success flex-shrink-0"></i>
                                    Browse expert mentors
                                </li>
                                <li class="flex items-center gap-2 text-sm text-body">
                                    <i data-lucide="check" class="w-4 h-4 text-success flex-shrink-0"></i>
                                    Send mentorship requests
                                </li>
                                <li class="flex items-center gap-2 text-sm text-body">
                                    <i data-lucide="check" class="w-4 h-4 text-success flex-shrink-0"></i>
                                    Get strategic guidance
                                </li>
                            </ul>

                            {{-- CTA --}}
                            <div class="inline-flex items-center gap-2 px-6 py-3 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 group-hover:shadow-primary-500/40 transition-all btn-shine">
                                Register as Startup
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- Mentor Card --}}
                <a href="{{ route('register.mentor') }}" class="group block">
                    <div class="bg-white rounded-2xl p-8 border-2 border-gray-100 card-hover text-center relative overflow-hidden group-hover:border-accent/40 transition-all">
                        {{-- Decorative gradient on hover --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-pink-50/0 to-purple-50/0 group-hover:from-pink-50/50 group-hover:to-purple-50/50 transition-all"></div>

                        <div class="relative">
                            {{-- Icon --}}
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-secondary to-accent mx-auto mb-6 flex items-center justify-center shadow-lg shadow-accent/25 group-hover:shadow-accent/40 group-hover:scale-110 transition-all">
                                <i data-lucide="graduation-cap" class="w-10 h-10 text-white"></i>
                            </div>

                            {{-- Title --}}
                            <h2 class="text-xl font-bold text-heading mb-3">I'm a Mentor</h2>

                            {{-- Description --}}
                            <p class="text-sm text-body leading-relaxed mb-6">
                                Have industry experience to share? Register as a mentor and help startups grow with your expertise.
                            </p>

                            {{-- Features --}}
                            <ul class="space-y-2 text-left mb-6">
                                <li class="flex items-center gap-2 text-sm text-body">
                                    <i data-lucide="check" class="w-4 h-4 text-success flex-shrink-0"></i>
                                    Showcase your expertise
                                </li>
                                <li class="flex items-center gap-2 text-sm text-body">
                                    <i data-lucide="check" class="w-4 h-4 text-success flex-shrink-0"></i>
                                    Receive mentorship requests
                                </li>
                                <li class="flex items-center gap-2 text-sm text-body">
                                    <i data-lucide="check" class="w-4 h-4 text-success flex-shrink-0"></i>
                                    Give back to the community
                                </li>
                            </ul>

                            {{-- CTA --}}
                            <div class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-secondary to-accent text-white font-semibold rounded-xl shadow-lg shadow-accent/25 group-hover:shadow-accent/40 transition-all btn-shine">
                                Register as Mentor
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Already have account --}}
            <div class="text-center mt-10 animate-fade-in-up-delay-2">
                <p class="text-sm text-body">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-primary-600 hover:text-primary-700 underline underline-offset-4">Log in here</a>
                </p>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    lucide.createIcons();
</script>
@endsection
