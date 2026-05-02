@extends('layouts.app')

@section('title', 'Register Startup | MentorConnect')

@section('content')

    <section class="relative overflow-hidden min-h-[85vh] flex items-center bg-white">
        {{-- Background --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-32 -right-32 w-80 h-80 bg-primary-100/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 -left-32 w-72 h-72 bg-purple-100/30 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative w-full">
            {{-- Header --}}
            <div class="text-center mb-8 animate-fade-in-up">
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 mb-4 font-medium">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back to role selection
                </a>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 rounded-full mb-4 mx-auto">
                    <i data-lucide="building-2" class="w-4 h-4 text-primary-600"></i>
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Startup Registration</span>
                </div>
                <h1 class="text-3xl font-bold text-heading mb-2">
                    Register Your <span class="gradient-text">Startup</span>
                </h1>
                <p class="text-body text-sm">Fill in your details to join the mentorship platform.</p>
            </div>

            {{-- Registration Form --}}
            {{-- Demonstrates: Form validation (Unit V), CSRF protection (Unit V), Form submission (Unit IV) --}}
            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 animate-fade-in-up-delay-1">
                <form action="{{ route('register.startup.submit') }}" method="POST">
                    {{-- CSRF Token (Unit V) --}}
                    @csrf

                    <div class="space-y-5">
                        {{-- Startup Name --}}
                        <div>
                            <label for="startup_name" class="block text-sm font-semibold text-heading mb-1.5">Startup Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="building" class="w-4 h-4 text-body"></i>
                                </div>
                                <input type="text" name="startup_name" id="startup_name" value="{{ old('startup_name') }}"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                    placeholder="e.g., TechVenture Labs">
                            </div>
                            {{-- Validation error display (Unit V) --}}
                            @error('startup_name')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Founder Name --}}
                        <div>
                            <label for="founder_name" class="block text-sm font-semibold text-heading mb-1.5">Founder Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="user" class="w-4 h-4 text-body"></i>
                                </div>
                                <input type="text" name="founder_name" id="founder_name" value="{{ old('founder_name') }}"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                    placeholder="e.g., Jane Smith">
                            </div>
                            @error('founder_name')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-heading mb-1.5">Email Address <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="mail" class="w-4 h-4 text-body"></i>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                    placeholder="e.g., jane@techventure.com">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password + Confirm --}}
                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="password" class="block text-sm font-semibold text-heading mb-1.5">Password <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="lock" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="password" name="password" id="password"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                        placeholder="Min 6 characters">
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                        <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-heading mb-1.5">Confirm Password <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="lock" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                        placeholder="Re-enter password">
                                </div>
                            </div>
                        </div>

                        <hr class="border-gray-100 my-1">

                        {{-- Industry --}}
                        <div>
                            <label for="industry" class="block text-sm font-semibold text-heading mb-1.5">Industry / Domain</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="briefcase" class="w-4 h-4 text-body"></i>
                                </div>
                                <input type="text" name="industry" id="industry" value="{{ old('industry') }}"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                    placeholder="e.g., EdTech, FinTech, HealthTech">
                            </div>
                            @error('industry')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Stage --}}
                        <div>
                            <label for="stage" class="block text-sm font-semibold text-heading mb-1.5">Startup Stage</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="signal" class="w-4 h-4 text-body"></i>
                                </div>
                                <select name="stage" id="stage"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all appearance-none">
                                    <option value="">Select your stage</option>
                                    <option value="Idea Stage" {{ old('stage') == 'Idea Stage' ? 'selected' : '' }}>💡 Idea Stage</option>
                                    <option value="MVP" {{ old('stage') == 'MVP' ? 'selected' : '' }}>🚀 MVP (Minimum Viable Product)</option>
                                    <option value="Early Traction" {{ old('stage') == 'Early Traction' ? 'selected' : '' }}>📈 Early Traction</option>
                                    <option value="Growth" {{ old('stage') == 'Growth' ? 'selected' : '' }}>🌱 Growth Stage</option>
                                    <option value="Scaling" {{ old('stage') == 'Scaling' ? 'selected' : '' }}>⚡ Scaling</option>
                                </select>
                            </div>
                            @error('stage')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Problem Statement --}}
                        <div>
                            <label for="problem_statement" class="block text-sm font-semibold text-heading mb-1.5">Problem Statement</label>
                            <textarea name="problem_statement" id="problem_statement" rows="3"
                                class="w-full px-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all resize-none"
                                placeholder="Briefly describe the problem your startup is solving...">{{ old('problem_statement') }}</textarea>
                            @error('problem_statement')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                            class="w-full py-3.5 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:scale-[1.02] transition-all btn-shine flex items-center justify-center gap-2">
                            <i data-lucide="rocket" class="w-5 h-5"></i>
                            Create Startup Account
                        </button>
                    </div>
                </form>
            </div>

            {{-- Login Link --}}
            <div class="text-center mt-6">
                <p class="text-sm text-body">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-primary-600 hover:text-primary-700 underline underline-offset-4">Log in here</a>
                </p>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
