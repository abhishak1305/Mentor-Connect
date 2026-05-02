@extends('layouts.app')

@section('title', $mentor->name . ' - Mentor Profile | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Breadcrumb Navigation (Unit II) --}}
            <nav class="flex text-sm text-body mb-8 animate-fade-in-up" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('mentors.index') }}" class="hover:text-primary-600 transition-colors">Browse Mentors</a></li>
                    <li><i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i></li>
                    <li class="font-semibold text-heading">{{ $mentor->name }}</li>
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
                                    {{ strtoupper(substr($mentor->name, 0, 1)) }}
                                </div>
                            </div>
                            <div class="pb-1">
                                <h1 class="text-2xl sm:text-3xl font-bold text-heading mb-1">{{ $mentor->name }}</h1>
                                <div class="flex items-center gap-3 mb-1">
                                    <p class="text-primary-600 font-medium">{{ $mentor->expertise }}</p>
                                    @if($mentor->reviews->count() > 0)
                                        <div class="flex items-center text-amber-400">
                                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                            <span class="text-xs font-bold text-heading ml-1">{{ number_format($mentor->reviews->avg('rating'), 1) }} ({{ $mentor->reviews->count() }})</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Action Button --}}
                        <div class="flex-shrink-0 pb-1">
                            <a href="#request-form" class="w-full sm:w-auto px-8 py-3.5 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:scale-105 transition-all btn-shine flex items-center justify-center gap-2">
                                <i data-lucide="send" class="w-5 h-5"></i>
                                Request Mentorship
                            </a>
                        </div>
                    </div>

                    {{-- Details Grid --}}
                    <div class="grid md:grid-cols-3 gap-8">
                        
                        {{-- Left Column: Bio & Details --}}
                        <div class="md:col-span-2 space-y-8">
                            {{-- About Section --}}
                            <div>
                                <h3 class="text-sm font-bold text-heading uppercase tracking-wider mb-4 flex items-center gap-2">
                                    <i data-lucide="user" class="w-4 h-4 text-primary-500"></i>
                                    About {{ explode(' ', trim($mentor->name))[0] }}
                                </h3>
                                <div class="text-body leading-relaxed space-y-4 bg-gray-50 rounded-2xl p-6 border border-gray-100">
                                    {{-- Use nl2br to handle newlines in the bio properly --}}
                                    {!! nl2br(e($mentor->bio)) !!}
                                </div>
                            </div>
                        </div>

                        {{-- Right Column: Stats & Tags --}}
                        <div class="space-y-6">
                            {{-- Experience Card --}}
                            <div class="bg-primary-50 rounded-2xl p-6 border border-primary-100 text-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-primary-500 mx-auto mb-3 shadow-sm">
                                    <i data-lucide="briefcase" class="w-6 h-6"></i>
                                </div>
                                <div class="text-3xl font-bold text-primary-700 mb-1">{{ $mentor->experience }}</div>
                                <div class="text-xs font-semibold text-primary-600 uppercase tracking-wider">Years Experience</div>
                            </div>

                            {{-- Category Card --}}
                            <div class="bg-pink-50 rounded-2xl p-6 border border-pink-100 text-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-accent mx-auto mb-3 shadow-sm">
                                    <i data-lucide="tag" class="w-6 h-6"></i>
                                </div>
                                <div class="text-lg font-bold text-pink-700 mb-1">{{ $mentor->category->name }}</div>
                                <div class="text-xs font-semibold text-accent uppercase tracking-wider">Mentorship Domain</div>
                            </div>
                        </div>

                    </div>

                    {{-- Request Mentorship Form (Unit V) --}}
                    <div id="request-form" class="mt-12 pt-8 border-t border-gray-100">
                        <h3 class="text-xl font-bold text-heading mb-6 flex items-center gap-2">
                            <i data-lucide="mail" class="w-5 h-5 text-primary-500"></i>
                            Send Mentorship Request
                        </h3>
                        
                        <form action="{{ route('requests.store') }}" method="POST" class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                            @csrf
                            <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
                            
                            <div class="mb-4">
                                <label for="message" class="block text-sm font-semibold text-heading mb-2">Why do you want to connect with {{ explode(' ', trim($mentor->name))[0] }}? *</label>
                                <textarea name="message" id="message" rows="5" placeholder="Briefly explain your startup's current challenges and how this mentor can help..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all outline-none resize-none {{ $errors->has('message') ? 'border-red-500 focus:ring-red-500/20 focus:border-red-500' : '' }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1.5 text-xs font-semibold text-red-500 flex items-center gap-1">
                                        <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-8 py-3.5 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:-translate-y-0.5 transition-all flex items-center gap-2">
                                    <i data-lucide="paperclip" class="w-4 h-4"></i>
                                    Submit Request
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Reviews Section (Feature 2) --}}
                    <div id="reviews" class="mt-12 pt-8 border-t border-gray-100">
                        <h3 class="text-xl font-bold text-heading mb-6 flex items-center gap-2">
                            <i data-lucide="star" class="w-5 h-5 text-amber-500"></i>
                            Reviews & Ratings
                        </h3>

                        {{-- Write Review Form (Only visible to approved startups who haven't reviewed) --}}
                        @if($canReview)
                            <form action="{{ route('reviews.store', $mentor->id) }}" method="POST" class="bg-amber-50 rounded-2xl p-6 border border-amber-100 mb-8">
                                @csrf
                                <h4 class="font-bold text-heading mb-4 text-sm uppercase tracking-wider">Write a Review</h4>
                                
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold text-heading mb-2">Rating *</label>
                                    <div class="flex items-center gap-4">
                                        @for($i = 5; $i >= 1; $i--)
                                            <label class="flex items-center gap-1 cursor-pointer">
                                                <input type="radio" name="rating" value="{{ $i }}" class="text-amber-500 focus:ring-amber-500" {{ old('rating') == $i ? 'checked' : '' }} required>
                                                <span class="text-sm font-semibold">{{ $i }} <i data-lucide="star" class="w-3 h-3 inline fill-amber-400 text-amber-400"></i></span>
                                            </label>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="review_text" class="block text-sm font-semibold text-heading mb-2">Your Review *</label>
                                    <textarea name="review_text" id="review_text" rows="3" placeholder="How was your mentorship experience?" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none resize-none" required>{{ old('review_text') }}</textarea>
                                    @error('review_text')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="px-6 py-2.5 bg-amber-500 text-white font-semibold rounded-xl hover:bg-amber-600 transition-all flex items-center gap-2 text-sm">
                                    <i data-lucide="check" class="w-4 h-4"></i> Submit Review
                                </button>
                            </form>
                        @endif

                        {{-- Existing Reviews List --}}
                        @if($mentor->reviews->isEmpty())
                            <div class="text-center py-8 bg-gray-50 rounded-2xl border border-gray-100">
                                <i data-lucide="message-square" class="w-8 h-8 text-gray-300 mx-auto mb-2"></i>
                                <p class="text-sm text-body">No reviews yet.</p>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($mentor->reviews as $review)
                                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center font-bold text-sm">
                                                    {{ strtoupper(substr($review->startup->startup_name ?? 'S', 0, 1)) }}
                                                </div>
                                                <div>
                                                    <h4 class="font-bold text-heading text-sm">{{ $review->startup->startup_name ?? 'Anonymous Startup' }}</h4>
                                                    <p class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center text-amber-400">
                                                @for($i = 0; $i < $review->rating; $i++)
                                                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                                @endfor
                                                @for($i = 0; $i < (5 - $review->rating); $i++)
                                                    <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="text-sm text-body leading-relaxed">{{ $review->review_text }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
