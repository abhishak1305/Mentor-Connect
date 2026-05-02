@extends('layouts.app')

@section('title', 'Community Post | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Breadcrumb Navigation --}}
            <nav class="flex text-sm text-body mb-8 animate-fade-in-up" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('posts.index') }}" class="hover:text-primary-600 transition-colors">Community</a></li>
                    <li><i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i></li>
                    <li class="font-semibold text-heading truncate max-w-xs">Post by {{ $post->author_name }}</li>
                </ol>
            </nav>

            {{-- Post Detail Card --}}
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden animate-fade-in-up-delay-1">
                
                {{-- Author Details Header --}}
                <div class="bg-gradient-to-r {{ $post->author_role === 'mentor' ? 'from-pink-50 to-pink-100/50 border-b border-pink-100' : 'from-primary-50 to-primary-100/50 border-b border-primary-100' }} p-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                    <div class="flex items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl flex items-center justify-center font-bold text-3xl shadow-md {{ $post->author_role === 'mentor' ? 'bg-pink-100 text-accent border border-pink-200' : 'bg-primary-100 text-primary-700 border border-primary-200' }}">
                            {{ strtoupper(substr($post->author_name, 0, 1)) }}
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-heading mb-1 flex items-center gap-2">
                                {{ $post->author_name }}
                                <span class="text-[10px] px-2.5 py-1 rounded-full uppercase tracking-wider font-semibold {{ $post->author_role === 'mentor' ? 'bg-pink-100 text-accent' : 'bg-primary-100 text-primary-700' }}">
                                    {{ $post->author_role }}
                                </span>
                            </h1>
                            
                            @if($author)
                                @if($post->author_role === 'mentor')
                                    <p class="text-sm font-medium text-pink-700">{{ $author->expertise }}</p>
                                    <p class="text-xs text-pink-600/80 mt-1"><i data-lucide="tag" class="w-3 h-3 inline"></i> {{ $author->category->name ?? 'General' }}</p>
                                @else
                                    <p class="text-sm font-medium text-primary-700">{{ $author->industry }}</p>
                                    <p class="text-xs text-primary-600/80 mt-1"><i data-lucide="activity" class="w-3 h-3 inline"></i> {{ ucfirst($author->startup_stage) }} Stage</p>
                                @endif
                            @endif
                        </div>
                    </div>
                    
                    {{-- Request Button for Mentors --}}
                    @if($post->author_role === 'mentor' && session('user_role') !== 'mentor')
                        <div class="flex-shrink-0">
                            <a href="{{ route('mentors.show', $post->author_id) }}#request-form" class="px-6 py-3 gradient-bg text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                                <i data-lucide="send" class="w-4 h-4"></i>
                                Request Mentorship
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Post Content --}}
                <div class="p-8">
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-medium mb-6 uppercase tracking-wider">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                        Published {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y \a\t g:i A') }}
                    </div>
                    
                    <div class="text-body text-lg leading-relaxed space-y-6">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
                
            </div>

        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
