@extends('layouts.app')

@section('title', 'Browse Mentors | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="mb-10 animate-fade-in-up">
                <h1 class="text-3xl font-bold text-heading mb-3">
                    Find Your <span class="gradient-text">Mentor</span>
                </h1>
                <p class="text-body text-lg max-w-2xl">
                    Browse our curated list of industry experts. Find the perfect match to accelerate your startup's growth.
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                
                {{-- Sidebar Filters --}}
                <div class="w-full lg:w-64 flex-shrink-0 animate-fade-in-up-delay-1">
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 sticky top-24 shadow-lg shadow-gray-200/40">
                        <h3 class="text-sm font-bold text-heading uppercase tracking-wider mb-4 flex items-center gap-2">
                            <i data-lucide="filter" class="w-4 h-4 text-primary-500"></i>
                            Categories
                        </h3>
                        
                        <div class="space-y-1">
                            <a href="{{ route('mentors.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl {{ empty($selectedCategory) ? 'bg-primary-50 text-primary-700 font-medium' : 'text-body hover:bg-gray-50 hover:text-heading font-medium' }} text-sm transition-all group">
                                <span class="flex items-center gap-2">
                                    <i data-lucide="layout-grid" class="w-4 h-4 {{ empty($selectedCategory) ? 'text-primary-500' : 'text-gray-400 group-hover:text-primary-500' }} transition-colors"></i>
                                    All Categories
                                </span>
                            </a>
                            
                            {{-- Demonstrates: Looping through Eloquent collection (Unit II) --}}
                            @foreach($categories as $category)
                                @php
                                    $isActive = $selectedCategory == $category->id;
                                @endphp
                                <a href="{{ route('mentors.index', ['category' => $category->id]) }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl {{ $isActive ? 'bg-primary-50 text-primary-700 font-medium' : 'text-body hover:bg-gray-50 hover:text-heading font-medium' }} text-sm transition-all group">
                                    <span class="flex items-center gap-2">
                                        <i data-lucide="{{ $category->icon ?? 'circle' }}" class="w-4 h-4 {{ $isActive ? 'text-primary-500' : 'text-gray-400 group-hover:text-primary-500' }} transition-colors"></i>
                                        {{ $category->name }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Mentors Grid --}}
                <div class="flex-1">
                    <div class="grid md:grid-cols-2 gap-6">
                        {{-- Demonstrates: Checking empty collections and looping --}}
                        @forelse($mentors as $index => $mentor)
                            <div class="bg-white rounded-2xl border border-gray-100 p-6 card-hover shadow-lg shadow-gray-200/40 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                                
                                {{-- Card Header: Avatar & Name --}}
                                <div class="flex items-start gap-4 mb-4">
                                    <div class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center flex-shrink-0 shadow-lg shadow-primary-500/20 text-white font-bold text-xl">
                                        {{ strtoupper(substr($mentor->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold text-heading">{{ $mentor->name }}</h2>
                                        <p class="text-sm text-primary-600 font-medium mb-1">{{ $mentor->expertise }}</p>
                                        <div class="flex items-center gap-3 text-xs text-body">
                                            <span class="flex items-center gap-1">
                                                <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
                                                {{ $mentor->experience }} Yrs Exp.
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <i data-lucide="tag" class="w-3.5 h-3.5"></i>
                                                {{ $mentor->category->name }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Bio --}}
                                <p class="text-sm text-body leading-relaxed mb-6 line-clamp-3">
                                    {{ $mentor->bio }}
                                </p>

                                {{-- Action Buttons --}}
                                <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-100">
                                    <a href="{{ route('mentors.show', $mentor->id) }}" class="flex-1 py-2.5 bg-primary-50 text-primary-700 font-semibold rounded-xl hover:bg-primary-100 transition-colors text-sm flex items-center justify-center gap-2">
                                        <i data-lucide="user" class="w-4 h-4"></i>
                                        View Profile
                                    </a>
                                    <button class="flex-1 py-2.5 gradient-bg text-white font-semibold rounded-xl shadow-md shadow-primary-500/25 hover:shadow-primary-500/40 transition-all text-sm flex items-center justify-center gap-2 btn-shine">
                                        <i data-lucide="send" class="w-4 h-4"></i>
                                        Request
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-2 text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i data-lucide="search-x" class="w-8 h-8 text-gray-400"></i>
                                </div>
                                <h3 class="text-lg font-bold text-heading mb-2">No Mentors Found</h3>
                                <p class="text-body text-sm">There are currently no approved mentors on the platform.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
