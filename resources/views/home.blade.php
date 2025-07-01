@extends('layouts.app')

@section('title', 'Prompt Collection - by Adit Tanu')

@section('content')
    <!-- Hero Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-6xl font-bold text-gray-900 mb-6">{{ __('messages.hero.title') }}</h1>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto mb-12">
                {{ __('messages.hero.description') }}
            </p>

            <div class="flex justify-center space-x-6 mb-16">
                <a href="#prompts"
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                    {{ __('messages.hero.explore_collection') }}
                </a>
                <a href="#prompts"
                    class="border border-gray-300 text-gray-700 px-8 py-3 rounded-lg font-medium hover:bg-gray-50 transition flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    {{ __('messages.hero.popular_prompts') }}
                </a>
            </div>


            <!-- Stats -->
            <div class="flex justify-center space-x-16 text-center">
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">{{ $stats['total_prompts'] ?? 8 }}+</div>
                    <div class="text-gray-600 font-medium">{{ __('messages.hero.total_prompts') }}</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ $stats['content_types'] ?? 3 }}</div>
                    <div class="text-gray-600 font-medium">{{ __('messages.hero.content_types') }}</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-purple-600 mb-2">100%</div>
                    <div class="text-gray-600 font-medium">{{ __('messages.hero.quality_results') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prompts Section -->
    <section id="prompts" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold text-gray-900 mb-8">{{ __('messages.prompts.collection_title') }}</h3>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto mb-8">
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" id="search-input"
                            placeholder="{{ __('messages.prompts.search_placeholder') }}"
                            class="w-full pl-12 pr-4 py-4 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                    </div>
                </div>

                <!-- Filter Buttons -->
                <div class="flex justify-center flex-wrap gap-4 mb-8">
                    <button data-filter="all"
                        class="filter-btn px-6 py-3 rounded-xl {{ !request()->segment(2) ? 'bg-black text-white' : 'bg-white text-gray-700 border border-gray-300' }} hover:bg-gray-800 hover:text-white transition font-medium">
                        {{ __('messages.prompts.all_prompts') }} ({{ $stats['total_prompts'] ?? $prompts->count() }})
                    </button>
                    <button data-filter="image"
                        class="filter-btn px-6 py-3 rounded-xl {{ request()->segment(2) == 'image' ? 'bg-black text-white' : 'bg-white text-gray-700 border border-gray-300' }} hover:bg-gray-800 hover:text-white transition flex items-center font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ __('messages.prompts.images') }} ({{ $stats['image_count'] ?? 0 }})
                    </button>
                    <button data-filter="video"
                        class="filter-btn px-6 py-3 rounded-xl {{ request()->segment(2) == 'video' ? 'bg-black text-white' : 'bg-white text-gray-700 border border-gray-300' }} hover:bg-gray-800 hover:text-white transition flex items-center font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ __('messages.prompts.videos') }} ({{ $stats['video_count'] ?? 0 }})
                    </button>
                    <button data-filter="text"
                        class="filter-btn px-6 py-3 rounded-xl {{ request()->segment(2) == 'text' ? 'bg-black text-white' : 'bg-white text-gray-700 border border-gray-300' }} hover:bg-gray-800 hover:text-white transition flex items-center font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        {{ __('messages.prompts.text') }} ({{ $stats['text_count'] ?? 0 }})
                    </button>
                </div>

                <p class="text-gray-600 text-lg" id="showing-text">{{ __('messages.prompts.showing') }}
                    {{ $prompts->count() }} {{ __('messages.prompts.of') }}
                    {{ $stats['total_prompts'] ?? $prompts->count() }} {{ __('messages.prompts.prompts') }}</p>
            </div>

            <!-- Prompt Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="prompts-grid">
                @include('partials.prompt-cards', ['prompts' => $prompts])
            </div>

            <!-- Infinite Scroll Status Indicator -->
            <div class="text-center mt-12" id="scroll-status">
                @if($prompts->hasMorePages())
                    <div id="has-more-indicator" class="text-gray-500">
                        <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                        <p class="text-sm">{{ __('messages.prompts.scroll_for_more') }}</p>
                    </div>
                @else
                    <div id="no-more-indicator" class="text-gray-400">
                        <p class="text-sm">{{ __('messages.prompts.no_more_prompts') }}</p>
                    </div>
                @endif
            </div>

            <!-- Load More Button (Hidden by default, infinite scroll is used) -->
            <div class="text-center mt-12" id="load-more-container" style="display: none;">
                <button id="load-more-btn" onclick="loadMorePrompts()" 
                        class="bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                    {{ __('messages.prompts.load_more') }}
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">{{ __('messages.about.title') }}</h3>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-lg text-gray-600 mb-6">
                        {{ __('messages.about.description_1') }}
                    </p>
                    <p class="text-gray-600">
                        {{ __('messages.about.description_2') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div class="text-center p-6 bg-green-50 rounded-xl">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">{{ __('messages.about.visual_content') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('messages.about.visual_desc') }}</p>
                    </div>

                    <div class="text-center p-6 bg-blue-50 rounded-xl">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">{{ __('messages.about.educational_content') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('messages.about.educational_desc') }}</p>
                    </div>

                    <div class="text-center p-6 bg-yellow-50 rounded-xl">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">{{ __('messages.about.video_content') }}</h4>
                        <p class="text-sm text-gray-600">{{ __('messages.about.video_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
