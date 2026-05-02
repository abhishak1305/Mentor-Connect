@extends('layouts.app')

@section('title', 'Mentor Dashboard | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Dashboard Header --}}
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold text-heading mb-2">
                    Welcome, <span class="gradient-text">{{ session('user_name') }}</span> 👋
                </h1>
                <p class="text-body text-sm">Manage your incoming mentorship requests from startups.</p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10 animate-fade-in-up-delay-1">
                {{-- Total --}}
                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center">
                            <i data-lucide="inbox" class="w-5 h-5 text-primary-500"></i>
                        </div>
                        <span class="text-xs font-semibold text-body uppercase tracking-wider">Total</span>
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
                    <i data-lucide="mail" class="w-5 h-5 text-primary-500"></i>
                    Mentorship Requests
                </h2>

                @if($requests->isEmpty())
                    {{-- Empty State --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
                        <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="inbox" class="w-8 h-8 text-primary-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-heading mb-2">No requests yet</h3>
                        <p class="text-body text-sm">When startups send you mentorship requests, they will appear here.</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($requests as $req)
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                                <div class="p-6">
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                                        {{-- Startup Info --}}
                                        <div class="flex items-start gap-4 flex-1">
                                            {{-- Avatar --}}
                                            <div class="w-12 h-12 rounded-xl gradient-bg flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                                {{ strtoupper(substr($req->startup->startup_name ?? 'S', 0, 1)) }}
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 mb-1 flex-wrap">
                                                    <h3 class="font-bold text-heading">{{ $req->startup->startup_name ?? 'Unknown Startup' }}</h3>
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
                                                    Founded by <span class="font-medium text-heading">{{ $req->startup->founder_name ?? 'N/A' }}</span>
                                                    @if($req->startup->industry)
                                                        · {{ $req->startup->industry }}
                                                    @endif
                                                    @if($req->startup->stage)
                                                        · {{ $req->startup->stage }}
                                                    @endif
                                                </p>
                                                {{-- Message --}}
                                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                                    <p class="text-sm text-body leading-relaxed">{!! nl2br(e($req->message)) !!}</p>
                                                </div>
                                                <p class="text-xs text-gray-400 mt-2">
                                                    <i data-lucide="calendar" class="w-3 h-3 inline"></i>
                                                    Received {{ $req->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>

                                        {{-- Actions --}}
                                        <div class="flex flex-wrap sm:flex-col gap-2 flex-shrink-0">
                                            <a href="{{ route('startups.show', $req->startup->id) }}" class="w-full sm:w-auto px-4 py-2.5 bg-primary-50 text-primary-700 font-semibold text-sm rounded-xl hover:bg-primary-100 border border-primary-200 transition-all flex items-center justify-center gap-1.5">
                                                <i data-lucide="user" class="w-4 h-4"></i> View Profile
                                            </a>
                                            
                                            @if($req->status === 'pending')
                                                <form action="{{ route('requests.update', $req->id) }}" method="POST" class="w-full sm:w-auto">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="w-full px-4 py-2.5 bg-emerald-50 text-emerald-700 font-semibold text-sm rounded-xl hover:bg-emerald-100 border border-emerald-200 transition-all flex items-center justify-center gap-1.5">
                                                        <i data-lucide="check" class="w-4 h-4"></i> Approve
                                                    </button>
                                                </form>
                                                <form action="{{ route('requests.update', $req->id) }}" method="POST" class="w-full sm:w-auto">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="w-full px-4 py-2.5 bg-red-50 text-red-700 font-semibold text-sm rounded-xl hover:bg-red-100 border border-red-200 transition-all flex items-center justify-center gap-1.5">
                                                        <i data-lucide="x" class="w-4 h-4"></i> Reject
                                                    </button>
                                                </form>
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
