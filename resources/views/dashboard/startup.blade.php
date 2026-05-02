@extends('layouts.app')

@section('title', 'Startup Dashboard | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Dashboard Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 animate-fade-in-up">
                <div>
                    <h1 class="text-3xl font-bold text-heading mb-2">
                        Welcome, <span class="gradient-text">{{ session('user_name') }}</span> 👋
                    </h1>
                    <p class="text-body text-sm">Track the status of your mentorship requests.</p>
                </div>
                <a href="{{ route('mentors.index') }}" class="inline-flex items-center gap-2 px-6 py-3 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:scale-105 transition-all btn-shine text-sm">
                    <i data-lucide="search" class="w-4 h-4"></i>
                    Browse Mentors
                </a>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10 animate-fade-in-up-delay-1">
                {{-- Total --}}
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="send" class="w-5 h-5 text-primary-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-body uppercase tracking-wider">Sent</span>
                    </div>
                    <p class="text-2xl font-bold text-heading">{{ $stats['total'] }}</p>
                </div>
                {{-- Pending --}}
                <div class="bg-white rounded-2xl p-5 border border-amber-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="clock" class="w-5 h-5 text-amber-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-body uppercase tracking-wider">Pending</span>
                    </div>
                    <p class="text-2xl font-bold text-amber-600">{{ $stats['pending'] }}</p>
                </div>
                {{-- Approved --}}
                <div class="bg-white rounded-2xl p-5 border border-emerald-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-body uppercase tracking-wider">Approved</span>
                    </div>
                    <p class="text-2xl font-bold text-emerald-600">{{ $stats['approved'] }}</p>
                </div>
                {{-- Rejected --}}
                <div class="bg-white rounded-2xl p-5 border border-red-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="x-circle" class="w-5 h-5 text-red-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-body uppercase tracking-wider">Rejected</span>
                    </div>
                    <p class="text-2xl font-bold text-red-600">{{ $stats['rejected'] }}</p>
                </div>
            </div>

            {{-- Requests List --}}
            <div class="animate-fade-in-up-delay-2">
                <h2 class="text-lg font-bold text-heading mb-4 flex items-center gap-2">
                    <i data-lucide="list" class="w-5 h-5 text-primary-500"></i>
                    Your Mentorship Requests
                </h2>

                @if($requests->isEmpty())
                    {{-- Empty State --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
                        <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="send" class="w-8 h-8 text-primary-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-heading mb-2">No requests sent yet</h3>
                        <p class="text-body text-sm mb-6">Start by browsing our mentor directory and sending your first request!</p>
                        <a href="{{ route('mentors.index') }}" class="inline-flex items-center gap-2 px-6 py-3 gradient-bg text-white font-semibold rounded-xl shadow-lg text-sm btn-shine">
                            <i data-lucide="search" class="w-4 h-4"></i>
                            Find a Mentor
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($requests as $req)
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                                <div class="p-6">
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                                        {{-- Mentor Info --}}
                                        <div class="flex items-start gap-4 flex-1">
                                            {{-- Avatar --}}
                                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-secondary to-accent flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                                {{ strtoupper(substr($req->mentor->name ?? 'M', 0, 1)) }}
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 mb-1 flex-wrap">
                                                    <h3 class="font-bold text-heading">{{ $req->mentor->name ?? 'Unknown Mentor' }}</h3>
                                                    {{-- Status Badge --}}
                                                    @if($req->status === 'pending')
                                                        <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 border border-amber-200">⏳ Pending</span>
                                                    @elseif($req->status === 'approved')
                                                        <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">✅ Approved</span>
                                                    @else
                                                        <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-red-50 text-red-700 border border-red-200">❌ Rejected</span>
                                                    @endif
                                                </div>
                                                <p class="text-xs text-body mb-2">
                                                    <span class="font-medium text-heading">{{ $req->mentor->expertise ?? 'N/A' }}</span>
                                                    @if($req->mentor->category)
                                                        · {{ $req->mentor->category->name }}
                                                    @endif
                                                    · {{ $req->mentor->experience ?? 0 }} yrs experience
                                                </p>
                                                {{-- Message Sent --}}
                                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                    <p class="text-xs font-semibold text-body uppercase tracking-wider mb-1">Your Message:</p>
                                                    <p class="text-sm text-body leading-relaxed">{!! nl2br(e($req->message)) !!}</p>
                                                </div>
                                                <p class="text-xs text-gray-400 mt-2">
                                                    <i data-lucide="calendar" class="w-3 h-3 inline"></i>
                                                    Sent {{ $req->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>

                                        {{-- Actions --}}
                                        <div class="flex-shrink-0 flex flex-col gap-2">
                                            <a href="{{ route('mentors.show', $req->mentor->id) }}" class="w-full px-4 py-2.5 bg-primary-50 text-primary-700 font-semibold text-sm rounded-xl hover:bg-primary-100 border border-primary-200 transition-all flex items-center justify-center gap-1.5">
                                                <i data-lucide="user" class="w-4 h-4"></i> View Profile
                                            </a>
                                            
                                            @if($req->status === 'approved')
                                                <a href="{{ route('mentors.show', $req->mentor->id) }}#reviews" class="w-full px-4 py-2.5 bg-amber-50 text-amber-700 font-semibold text-sm rounded-xl hover:bg-amber-100 border border-amber-200 transition-all flex items-center justify-center gap-1.5">
                                                    ⭐ Rate Mentor
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
