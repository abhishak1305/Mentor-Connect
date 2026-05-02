@extends('layouts.app')

@section('title', $startup->startup_name . ' - Startup Profile | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Breadcrumb Navigation --}}
            <nav class="flex text-sm text-body mb-8 animate-fade-in-up" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ session('user_role') === 'mentor' ? route('dashboard.mentor') : route('dashboard.startup') }}" class="hover:text-primary-600 transition-colors">Dashboard</a></li>
                    <li><i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i></li>
                    <li class="font-semibold text-heading">{{ $startup->startup_name }}</li>
                </ol>
            </nav>

            {{-- Main Profile Card --}}
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden animate-fade-in-up-delay-1">
                
                {{-- Decorative Header Banner --}}
                <div class="h-32 bg-gradient-to-r from-primary-500 via-secondary to-accent relative">
                    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
                </div>

                <div class="px-8 pb-8 relative">
                    
                    {{-- Avatar & Quick Info --}}
                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 -mt-12 mb-8">
                        <div class="flex items-end gap-5">
                            {{-- Large Avatar --}}
                            <div class="w-24 h-24 rounded-2xl bg-white p-1.5 shadow-lg flex-shrink-0">
                                <div class="w-full h-full rounded-xl gradient-bg flex items-center justify-center text-white font-bold text-3xl">
                                    {{ strtoupper(substr($startup->startup_name, 0, 1)) }}
                                </div>
                            </div>
                            <div class="pb-1">
                                <h1 class="text-2xl sm:text-3xl font-bold text-heading mb-1">{{ $startup->startup_name }}</h1>
                                <p class="text-primary-600 font-medium">Founder: {{ $startup->founder_name }}</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    {{-- Details Grid --}}
                    <div class="grid md:grid-cols-3 gap-8">
                        
                        {{-- Left Column: Problem Statement & Details --}}
                        <div class="md:col-span-2 space-y-8">
                            {{-- About Section --}}
                            <div>
                                <h3 class="text-sm font-bold text-heading uppercase tracking-wider mb-4 flex items-center gap-2">
                                    <i data-lucide="target" class="w-4 h-4 text-primary-500"></i>
                                    Problem Statement / Core Focus
                                </h3>
                                <div class="text-body leading-relaxed space-y-4 bg-gray-50 rounded-2xl p-6 border border-gray-100">
                                    {!! nl2br(e($startup->problem_statement)) !!}
                                </div>
                            </div>
                        </div>

                        {{-- Right Column: Stats & Tags --}}
                        <div class="space-y-6">
                            {{-- Industry Card --}}
                            <div class="bg-primary-50 rounded-2xl p-6 border border-primary-100 text-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-primary-500 mx-auto mb-3 shadow-sm">
                                    <i data-lucide="briefcase" class="w-6 h-6"></i>
                                </div>
                                <div class="text-lg font-bold text-primary-700 mb-1">{{ $startup->industry }}</div>
                                <div class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Industry</div>
                            </div>

                            {{-- Stage Card --}}
                            <div class="bg-amber-50 rounded-2xl p-6 border border-amber-100 text-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-amber-500 mx-auto mb-3 shadow-sm">
                                    <i data-lucide="trending-up" class="w-6 h-6"></i>
                                </div>
                                <div class="text-lg font-bold text-amber-700 mb-1 capitalize">{{ $startup->startup_stage }}</div>
                                <div class="text-xs font-semibold text-amber-600 uppercase tracking-wider">Current Stage</div>
                            </div>
                        </div>

                    </div>

                    {{-- Contact Section --}}
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <h3 class="text-xl font-bold text-heading mb-6 flex items-center gap-2">
                            <i data-lucide="mail" class="w-5 h-5 text-primary-500"></i>
                            Contact Information
                        </h3>
                        
                        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div>
                                <p class="text-xs font-semibold text-body uppercase tracking-wider mb-1">Email Address</p>
                                <p class="text-lg font-bold text-heading">{{ $startup->email }}</p>
                            </div>
                            <a href="mailto:{{ $startup->email }}" class="px-6 py-2.5 bg-primary-50 text-primary-700 font-semibold rounded-xl hover:bg-primary-100 transition-all flex items-center gap-2 text-sm">
                                <i data-lucide="send" class="w-4 h-4"></i> Send Email
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
