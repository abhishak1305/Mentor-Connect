@extends('layouts.app')

@section('title', 'Register as Mentor | MentorConnect')

@section('content')

    <section class="relative overflow-hidden min-h-[85vh] flex items-center bg-white">
        {{-- Background --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-32 -right-32 w-80 h-80 bg-pink-100/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 -left-32 w-72 h-72 bg-purple-100/30 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative w-full">
            {{-- Header --}}
            <div class="text-center mb-8 animate-fade-in-up">
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 mb-4 font-medium">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back to role selection
                </a>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-pink-50 rounded-full mb-4 mx-auto">
                    <i data-lucide="graduation-cap" class="w-4 h-4 text-accent"></i>
                    <span class="text-xs font-semibold text-accent uppercase tracking-wider">Mentor Registration</span>
                </div>
                <h1 class="text-3xl font-bold text-heading mb-2">
                    Become a <span class="gradient-text">Mentor</span>
                </h1>
                <p class="text-body text-sm">Share your expertise and help startups grow.</p>
            </div>

            {{-- Registration Form --}}
            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 animate-fade-in-up-delay-1">
                <form action="{{ route('register.mentor.submit') }}" method="POST">
                    @csrf

                    <div class="space-y-5">
                        {{-- Full Name --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-heading mb-1.5">Full Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="user" class="w-4 h-4 text-body"></i>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                    placeholder="e.g., Rahul Sharma">
                            </div>
                            @error('name')
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
                                    placeholder="e.g., rahul@example.com">
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

                        {{-- Expertise --}}
                        <div>
                            <label for="expertise" class="block text-sm font-semibold text-heading mb-1.5">Area of Expertise <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="award" class="w-4 h-4 text-body"></i>
                                </div>
                                <input type="text" name="expertise" id="expertise" value="{{ old('expertise') }}"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                    placeholder="e.g., Product Strategy, Full-Stack Development">
                            </div>
                            @error('expertise')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Experience + Category --}}
                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label for="experience" class="block text-sm font-semibold text-heading mb-1.5">Years of Experience <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="clock" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="number" name="experience" id="experience" value="{{ old('experience') }}" min="0" max="50"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                        placeholder="e.g., 8">
                                </div>
                                @error('experience')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                        <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label for="category_id" class="block text-sm font-semibold text-heading mb-1.5">Category <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="tag" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <select name="category_id" id="category_id"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all appearance-none">
                                        <option value="">Select category</option>
                                        {{-- Categories passed from controller (Unit II - passing data to view) --}}
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                        <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Bio --}}
                        <div>
                            <label for="bio" class="block text-sm font-semibold text-heading mb-1.5">Short Bio</label>
                            <textarea name="bio" id="bio" rows="3"
                                class="w-full px-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all resize-none"
                                placeholder="Tell startups about your experience and what you can help with...">{{ old('bio') }}</textarea>
                            @error('bio')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            class="w-full py-3.5 bg-gradient-to-r from-secondary to-accent text-white font-semibold rounded-xl shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:scale-[1.02] transition-all btn-shine flex items-center justify-center gap-2">
                            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                            Create Mentor Account
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
