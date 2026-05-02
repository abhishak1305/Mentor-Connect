@extends('layouts.app')

@section('title', 'Edit Profile | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold text-heading mb-2">
                    My <span class="gradient-text">Profile</span>
                </h1>
                <p class="text-body text-sm">View and update your personal details.</p>
            </div>

            {{-- Profile Form --}}
            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 animate-fade-in-up-delay-1">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        
                        @if($role === 'mentor')
                            {{-- MENTOR FIELDS --}}
                            
                            {{-- Full Name --}}
                            <div>
                                <label for="name" class="block text-sm font-semibold text-heading mb-1.5">Full Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="user" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="block text-sm font-semibold text-heading mb-1.5">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="mail" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid md:grid-cols-2 gap-5">
                                {{-- Experience --}}
                                <div>
                                    <label for="experience" class="block text-sm font-semibold text-heading mb-1.5">Years of Experience</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <i data-lucide="clock" class="w-4 h-4 text-body"></i>
                                        </div>
                                        <input type="number" name="experience" id="experience" value="{{ old('experience', $user->experience) }}" min="0" max="50"
                                            class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                    </div>
                                    @error('experience')
                                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div>
                                    <label for="category_id" class="block text-sm font-semibold text-heading mb-1.5">Category</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <i data-lucide="tag" class="w-4 h-4 text-body"></i>
                                        </div>
                                        <select name="category_id" id="category_id"
                                            class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all appearance-none">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $user->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Expertise --}}
                            <div>
                                <label for="expertise" class="block text-sm font-semibold text-heading mb-1.5">Area of Expertise</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="award" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="text" name="expertise" id="expertise" value="{{ old('expertise', $user->expertise) }}"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                </div>
                                @error('expertise')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Bio --}}
                            <div>
                                <label for="bio" class="block text-sm font-semibold text-heading mb-1.5">Short Bio</label>
                                <textarea name="bio" id="bio" rows="4"
                                    class="w-full px-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all resize-none">{{ old('bio', $user->bio) }}</textarea>
                                @error('bio')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>
                        @endif

                        @if($role === 'startup')
                            {{-- STARTUP FIELDS --}}
                            
                            {{-- Startup Name --}}
                            <div>
                                <label for="startup_name" class="block text-sm font-semibold text-heading mb-1.5">Startup Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="building" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="text" name="startup_name" id="startup_name" value="{{ old('startup_name', $user->startup_name) }}"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                </div>
                                @error('startup_name')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Founder Name --}}
                            <div>
                                <label for="founder_name" class="block text-sm font-semibold text-heading mb-1.5">Founder Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="user" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="text" name="founder_name" id="founder_name" value="{{ old('founder_name', $user->founder_name) }}"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                </div>
                                @error('founder_name')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="block text-sm font-semibold text-heading mb-1.5">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i data-lucide="mail" class="w-4 h-4 text-body"></i>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                        class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-5">
                                {{-- Industry --}}
                                <div>
                                    <label for="industry" class="block text-sm font-semibold text-heading mb-1.5">Industry</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <i data-lucide="briefcase" class="w-4 h-4 text-body"></i>
                                        </div>
                                        <input type="text" name="industry" id="industry" value="{{ old('industry', $user->industry) }}"
                                            class="w-full pl-10 pr-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all">
                                    </div>
                                    @error('industry')
                                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
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
                                            <option value="Idea Stage" {{ old('stage', $user->stage) == 'Idea Stage' ? 'selected' : '' }}>💡 Idea Stage</option>
                                            <option value="MVP" {{ old('stage', $user->stage) == 'MVP' ? 'selected' : '' }}>🚀 MVP</option>
                                            <option value="Early Traction" {{ old('stage', $user->stage) == 'Early Traction' ? 'selected' : '' }}>📈 Early Traction</option>
                                            <option value="Growth" {{ old('stage', $user->stage) == 'Growth' ? 'selected' : '' }}>🌱 Growth Stage</option>
                                            <option value="Scaling" {{ old('stage', $user->stage) == 'Scaling' ? 'selected' : '' }}>⚡ Scaling</option>
                                        </select>
                                    </div>
                                    @error('stage')
                                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Problem Statement --}}
                            <div>
                                <label for="problem_statement" class="block text-sm font-semibold text-heading mb-1.5">Problem Statement</label>
                                <textarea name="problem_statement" id="problem_statement" rows="4"
                                    class="w-full px-4 py-3 bg-surface border border-gray-200 rounded-xl text-sm text-heading placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-400 transition-all resize-none">{{ old('problem_statement', $user->problem_statement) }}</textarea>
                                @error('problem_statement')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}</p>
                                @enderror
                            </div>
                        @endif

                        {{-- Submit Button --}}
                        <div class="pt-2">
                            <button type="submit"
                                class="w-full py-3.5 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:scale-[1.02] transition-all btn-shine flex items-center justify-center gap-2">
                                <i data-lucide="save" class="w-5 h-5"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
