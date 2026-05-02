@extends('layouts.app')

@section('title', 'Community Board | MentorConnect')

@section('content')

    <section class="bg-surface min-h-screen py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8 animate-fade-in-up flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-heading mb-2">
                        Community <span class="gradient-text">Board</span>
                    </h1>
                    <p class="text-body text-sm">Share insights, ask questions, and connect with everyone.</p>
                </div>
            </div>

            {{-- Create Post Box (Only visible if logged in) --}}
            @if(session('user_id'))
                <div id="create-post" class="bg-white rounded-3xl p-6 shadow-lg shadow-gray-200/50 border border-primary-100 mb-10 animate-fade-in-up-delay-1">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-lg flex-shrink-0 shadow-sm">
                                {{ strtoupper(substr(session('user_name'), 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <textarea name="content" rows="3" placeholder="What's on your mind? Share an insight, ask a question..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all outline-none resize-none {{ $errors->has('content') ? 'border-red-500' : '' }}" required></textarea>
                                @error('content')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                                <div class="flex justify-end mt-3">
                                    <button type="submit" class="px-6 py-2.5 gradient-bg text-white font-semibold rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center gap-2 text-sm">
                                        <i data-lucide="send" class="w-4 h-4"></i> Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="bg-primary-50 rounded-2xl p-6 border border-primary-100 text-center mb-10">
                    <p class="text-primary-700 font-medium mb-3">Join the conversation with startups and mentors!</p>
                    <a href="{{ route('login') }}" class="inline-block px-6 py-2 bg-white text-primary-600 font-semibold rounded-xl shadow-sm hover:shadow text-sm transition-all">Log in to Post</a>
                </div>
            @endif

            {{-- Posts Feed --}}
            <div class="space-y-6 animate-fade-in-up-delay-2">
                @if($posts->isEmpty())
                    <div class="text-center py-16 bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <i data-lucide="message-square" class="w-12 h-12 text-gray-300 mx-auto mb-3"></i>
                        <h3 class="text-lg font-bold text-heading">No posts yet</h3>
                        <p class="text-body text-sm">Be the first to start the conversation!</p>
                    </div>
                @else
                    @foreach($posts as $post)
                        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg {{ $post->author_role === 'mentor' ? 'bg-pink-100 text-accent' : 'bg-primary-100 text-primary-700' }}">
                                        {{ strtoupper(substr($post->author_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-heading flex items-center gap-2">
                                            {{ $post->author_name }}
                                            <span class="text-[10px] px-2 py-0.5 rounded-full uppercase tracking-wider {{ $post->author_role === 'mentor' ? 'bg-pink-50 text-accent' : 'bg-primary-50 text-primary-600' }}">
                                                {{ $post->author_role }}
                                            </span>
                                        </h4>
                                        <p class="text-xs text-gray-400 flex items-center gap-1">
                                            <i data-lucide="clock" class="w-3 h-3"></i>
                                            {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-body leading-relaxed pl-[60px]">
                                {!! nl2br(e(\Illuminate\Support\Str::limit($post->content, 200))) !!}
                                
                                @if(strlen($post->content) > 200)
                                    <div class="mt-3">
                                        <a href="{{ route('posts.show', (string) $post->id) }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 hover:underline inline-flex items-center gap-1 transition-all">
                                            Read More <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                        </a>
                                    </div>
                                @else
                                    <div class="mt-3">
                                        <a href="{{ route('posts.show', (string) $post->id) }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700 hover:underline inline-flex items-center gap-1 transition-all">
                                            View Full Post <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>

@endsection

@section('scripts')
<script>lucide.createIcons();</script>
@endsection
