@extends('layouts.app')

@section('title', 'Log In | MentorConnect')

@section('content')

    <section class="relative overflow-hidden min-h-[85vh] flex items-center bg-white">
        {{-- Background --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-32 -right-32 w-80 h-80 bg-primary-100/30 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 -left-32 w-72 h-72 bg-purple-100/30 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-16 relative w-full">
            {{-- Header --}}
            <div class="text-center mb-8 animate-fade-in-up">
                <div class="w-16 h-16 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4 shadow-lg shadow-primary-500/25">
                    <i data-lucide="log-in" class="w-8 h-8 text-white"></i>
                </div>
                <h1 class="text-3xl font-bold text-heading mb-2">
                    Welcome <span class="gradient-text">Back</span>
                </h1>
                <p class="text-body text-sm">Log in to your MentorConnect account.</p>
            </div>

            {{-- Login Form --}}
            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 animate-fade-in-up-delay-1">
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf

                    <div class="space-y-5">
                        {{-- Role Selection --}}
                        <div>
                            <label class="block text-sm font-semibold text-heading mb-3">I am a <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="role" value="startup" class="peer sr-only" {{ old('role', 'startup') == 'startup' ? 'checked' : '' }}>
                                    <div class="flex items-center justify-center gap-2 px-4 py-3 bg-surface border-2 border-gray-200 rounded-xl text-sm font-medium text-body peer-checked:border-primary-500 peer-checked:bg-primary-50 peer-checked:text-primary-600 transition-all hover:border-gray-300">
                                        <i data-lucide="building-2" class="w-4 h-4"></i>
                                        Startup
                                    </div>
                                </label>
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="role" value="mentor" class="peer sr-only" {{ old('role') == 'mentor' ? 'checked' : '' }}>
                                    <div class="flex items-center justify-center gap-2 px-4 py-3 bg-surface border-2 border-gray-200 rounded-xl text-sm font-medium text-body peer-checked:border-accent peer-checked:bg-pink-50 peer-checked:text-accent transition-all hover:border-gray-300">
                                        <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                                        Mentor
                                    </div>
                                </label>
                            </div>
                            @error('role')
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
                                    placeholder="Enter your email">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="block text-sm font-semibold text-heading mb-1.5">Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="lock" class="w-4 h-4 text-body"></i>
                                </div>
                                <input type="password" name="password" id="password"
                                    class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all"
                                    placeholder="Enter your password">
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            class="w-full py-3.5 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:scale-[1.02] transition-all btn-shine flex items-center justify-center gap-2">
                            <i data-lucide="log-in" class="w-5 h-5"></i>
                            Log In
                        </button>
                    </div>
                </form>
            </div>

            {{-- Register Link --}}
            <div class="text-center mt-6">
                <p class="text-sm text-body">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-primary-600 hover:text-primary-700 underline underline-offset-4">Register here</a>
                </p>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
