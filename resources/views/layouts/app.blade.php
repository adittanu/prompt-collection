<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Prompt Collection - by Adit Tanu')</title>
    <meta name="description" content="@yield('description', 'Explore a curated collection of prompts and their amazing results. From stunning images and videos to comprehensive guides and tutorials.')">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS for animations and effects -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-color: #d1d5db;
        }

        .copy-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .copy-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .copy-btn:active {
            transform: translateY(0);
        }

        .copy-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .copy-btn:hover::before {
            left: 100%;
        }

        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .5;
            }
        }

        .bounce {
            animation: bounce 1s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }

        .tag {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            margin: 0.125rem;
        }

        .content-type-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-image {
            background: #10b981;
            color: white;
        }

        .badge-video {
            background: #f59e0b;
            color: white;
        }

        .badge-text {
            background: #6366f1;
            color: white;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900">
                        Prompt Collection
                    </a>
                    <span class="ml-2 text-sm text-gray-500">by Adit Tanu</span>
                </div>
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-gray-700 hover:text-gray-900 font-medium">{{ __('messages.nav.home') }}</a>
                    <a href="{{ route('home') }}#prompts"
                        class="text-gray-700 hover:text-gray-900 font-medium">{{ __('messages.nav.prompts') }}</a>
                    <a href="{{ route('home') }}#about"
                        class="text-gray-700 hover:text-gray-900 font-medium">{{ __('messages.nav.about') }}</a>

                    <!-- Language Switcher -->
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-gray-900 font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129">
                                </path>
                            </svg>
                            {{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('language.switch', 'id') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'id' ? 'bg-blue-50 text-blue-700' : '' }}">
                                    <span class="w-6 h-4 mr-2 bg-red-500 relative">
                                        <span class="absolute inset-0 bg-white"></span>
                                        <span class="absolute bottom-0 left-0 w-full h-2 bg-red-500"></span>
                                    </span>
                                    Indonesia
                                </a>
                                <a href="{{ route('language.switch', 'en') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'en' ? 'bg-blue-50 text-blue-700' : '' }}">
                                    <span class="w-6 h-4 mr-2 bg-blue-500 relative">
                                        <span class="absolute inset-0 bg-blue-500"></span>
                                        <span class="absolute top-0 left-0 w-full h-1 bg-red-500"></span>
                                        <span class="absolute top-1 left-0 w-full h-1 bg-white"></span>
                                        <span class="absolute top-2 left-0 w-full h-1 bg-red-500"></span>
                                        <span class="absolute top-3 left-0 w-full h-1 bg-white"></span>
                                    </span>
                                    English
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ __('messages.about.title') }}</h3>
                    <p class="text-gray-300">{{ __('messages.about.description_1') }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ __('messages.hero.content_types') }}</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                            <span>{{ __('messages.about.visual_content') }} -
                                {{ __('messages.about.visual_desc') }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-indigo-500 rounded-full mr-3"></span>
                            <span>{{ __('messages.about.educational_content') }} -
                                {{ __('messages.about.educational_desc') }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></span>
                            <span>{{ __('messages.about.video_content') }} -
                                {{ __('messages.about.video_desc') }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ __('messages.prompts.collection_title') }}</h3>
                    <p class="text-gray-300">{{ __('messages.about.description_2') }}</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>{{ __('messages.footer.copyright') }}</p>
                <p class="text-gray-400 mt-2">{{ __('messages.footer.tagline') }}</p>
            </div>
        </div>
    </footer> <!-- JavaScript for copy functionality and filtering -->
    <script>
        function copyToClipboard(text) {
            const button = event.target.closest('button');
            const originalHTML = button.innerHTML;
            const originalClasses = button.className;

            // Add loading animation
            button.innerHTML = `
                <svg class="w-4 h-4 mr-1 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                {{ __('messages.prompts.copying') ?? 'Copying...' }}
            `;
            button.disabled = true;
            button.className =
                'inline-flex items-center px-3 py-1 border border-blue-300 rounded-md text-sm font-medium text-blue-700 bg-blue-50 transition cursor-not-allowed';

            navigator.clipboard.writeText(text).then(function() {
                // Success animation
                button.innerHTML = `
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ __('messages.prompts.copied') }}
                `;
                button.className =
                    'inline-flex items-center px-3 py-1 border border-green-300 rounded-md text-sm font-medium text-green-700 bg-green-50 transition transform scale-105';

                // Add success pulse animation
                button.animate([{
                        transform: 'scale(1.05)'
                    },
                    {
                        transform: 'scale(1.1)'
                    },
                    {
                        transform: 'scale(1.05)'
                    }
                ], {
                    duration: 200,
                    easing: 'ease-in-out'
                });

                // Show toast notification
                showToast('{{ __('messages.prompts.copied') }}', 'success');

                setTimeout(() => {
                    // Fade back to original state
                    button.style.transition = 'all 0.3s ease';
                    button.innerHTML = originalHTML;
                    button.className = originalClasses;
                    button.disabled = false;

                    // Remove transition after animation
                    setTimeout(() => {
                        button.style.transition = '';
                    }, 300);
                }, 1500);
            }).catch(function(err) {
                // Error state
                button.innerHTML = `
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    {{ __('messages.prompts.copy_failed') ?? 'Failed' }}
                `;
                button.className =
                    'inline-flex items-center px-3 py-1 border border-red-300 rounded-md text-sm font-medium text-red-700 bg-red-50 transition';

                // Show error toast
                showToast('{{ __('messages.prompts.copy_failed') ?? 'Copy failed' }}', 'error');

                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.className = originalClasses;
                    button.disabled = false;
                }, 2000);
            });
        }

        function showToast(message, type = 'success') {
            // Remove existing toast if any
            const existingToast = document.querySelector('.toast');
            if (existingToast) {
                existingToast.remove();
            }

            // Create toast element
            const toast = document.createElement('div');
            toast.className = `toast fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg flex items-center space-x-2 transform translate-x-full transition-all duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
            }`;

            toast.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    ${type === 'success'
                        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>'
                        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>'
                    }
                </svg>
                <span class="font-medium">${message}</span>
            `;

            document.body.appendChild(toast);

            // Animate in
            setTimeout(() => {
                toast.style.transform = 'translateX(0)';
            }, 100);

            // Animate out and remove
            setTimeout(() => {
                toast.style.transform = 'translateX(full)';
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 300);
            }, 2000);
        }

        // Filter functionality without page refresh
        let currentFilter = 'all';
        let currentSearch = '';
        let isLoading = false;
        let hasMorePages = true;
        let nextPageUrl = null;
        let currentPage = 1;

        function filterPrompts(type) {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const promptsGrid = document.querySelector('#prompts-grid');
            const showingText = document.querySelector('#showing-text');

            // Reset pagination state
            currentFilter = type;
            isLoading = false;
            hasMorePages = true;
            nextPageUrl = null;
            currentPage = 1;

            // Update active button styling
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-black', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
            });

            const activeButton = document.querySelector(`[data-filter="${type}"]`);
            if (activeButton) {
                activeButton.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                activeButton.classList.add('bg-black', 'text-white');
            }

            // Show loading state
            promptsGrid.innerHTML =
                '<div class="col-span-full text-center py-8"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div><p class="mt-4 text-gray-600">{{ __('messages.prompts.loading') }}</p></div>';

            // Prepare request data
            const requestData = {};
            if (currentSearch) {
                requestData.search = currentSearch;
            }

            // Fetch filtered data
            const url = type === 'all' ? '/' : `/prompts/${type}`;

            fetch(url + '?' + new URLSearchParams(requestData), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update the prompts grid
                    promptsGrid.innerHTML = data.html;

                    // Update pagination state
                    hasMorePages = data.hasMorePages;
                    nextPageUrl = data.nextPageUrl;
                    currentPage = data.currentPage;

                    // Update showing text
                    if (showingText) {
                        showingText.textContent =
                            `{{ __('messages.prompts.showing') }} ${data.count} {{ __('messages.prompts.of') }} ${data.total} {{ __('messages.prompts.prompts') }}`;
                    }

                    // Remove load more button since we're using infinite scroll
                    hideLoadMoreButton();

                    // Update scroll status indicator
                    updateScrollStatus();
                })
                .catch(error => {
                    console.error('Error:', error);
                    promptsGrid.innerHTML =
                        '<div class="col-span-full text-center py-8 text-red-600">{{ __('messages.prompts.error') }}</div>';
                });
        }

        function loadMorePrompts() {
            if (isLoading || !hasMorePages || !nextPageUrl) return;

            console.log('Loading more prompts...'); // Debug log
            isLoading = true;

            // Update scroll status to show loading
            updateScrollStatus();

            const promptsGrid = document.querySelector('#prompts-grid');

            // Prepare request data
            const requestData = {};
            if (currentSearch) {
                requestData.search = currentSearch;
            }

            const urlWithParams = nextPageUrl + (nextPageUrl.includes('?') ? '&' : '?') + new URLSearchParams(requestData);

            fetch(urlWithParams, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data loaded:', data); // Debug log

                    // Check if we got a valid response
                    if (!data || typeof data !== 'object') {
                        throw new Error('Invalid response format');
                    }

                    let newCards = [];

                    // Append new cards to existing grid
                    if (data.html && data.html.trim()) {
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = data.html;

                        // Add each new card with a slight animation
                        newCards = Array.from(tempDiv.children);
                        newCards.forEach((card, index) => {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            promptsGrid.appendChild(card);

                            // Animate in with delay
                            setTimeout(() => {
                                card.style.transition = 'all 0.3s ease';
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, index * 100);
                        });
                    }

                    // Update pagination state
                    hasMorePages = data.hasMorePages || false;
                    nextPageUrl = data.nextPageUrl || null;
                    currentPage = data.currentPage || 1;

                    // Update showing text
                    const showingText = document.querySelector('#showing-text');
                    if (showingText && data.total) {
                        const currentCount = promptsGrid.children.length;
                        showingText.textContent =
                            `{{ __('messages.prompts.showing') }} ${currentCount} {{ __('messages.prompts.of') }} ${data.total} {{ __('messages.prompts.prompts') }}`;
                    }

                    // Show success toast only if we actually loaded new cards
                    if (newCards.length > 0) {
                        // showToast(`{{ __('messages.prompts.loaded') ?? 'Loaded' }} ${newCards.length} {{ __('messages.prompts.more_prompts') ?? 'more prompts' }}`, 'success');
                    }

                    // Update scroll status indicator
                    isLoading = false;
                    updateScrollStatus();

                    console.log('Loading complete. Has more pages:', hasMorePages); // Debug log
                })
                .catch(error => {
                    console.error('Error loading more prompts:', error);

                    // Show more specific error toast
                    const errorMessage = '{{ __('messages.prompts.error') ?? 'Error loading prompts' }}';
                    showToast(errorMessage, 'error');

                    isLoading = false;
                    updateScrollStatus();
                });
        }

        function hideLoadMoreButton() {
            const loadMoreContainer = document.querySelector('#load-more-container');
            if (loadMoreContainer) {
                loadMoreContainer.style.display = 'none';
            }
        }

        function updateScrollStatus() {
            const scrollStatus = document.querySelector('#scroll-status');
            if (!scrollStatus) return;

            if (isLoading) {
                // Show loading state in scroll indicator
                scrollStatus.innerHTML = `
                    <div id="loading-indicator-status" class="text-blue-600">
                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600 mx-auto mb-2"></div>
                        <p class="text-sm">{{ __('messages.prompts.loading') }}</p>
                    </div>
                `;
            } else if (hasMorePages) {
                scrollStatus.innerHTML = `
                    <div id="has-more-indicator" class="text-gray-500 hover:text-gray-700 transition-colors cursor-pointer" onclick="loadMorePrompts()">
                        <div class="animate-bounce">
                            <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </div>
                        <p class="text-sm">{{ __('messages.prompts.scroll_for_more') }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ __('messages.prompts.or_click_here') }}</p>
                    </div>
                `;
            } else {
                scrollStatus.innerHTML = `
                    <div id="no-more-indicator" class="text-gray-400">
                        <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <p class="text-sm">{{ __('messages.prompts.no_more_prompts') }}</p>
                    </div>
                `;
            }
        }

        // Infinite scroll functionality - trigger when scroll indicator comes into view
        function initInfiniteScroll() {
            let scrollTimeout;

            window.addEventListener('scroll', () => {
                // Debounce scroll events for better performance
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    if (isLoading || !hasMorePages) return;

                    // Get scroll indicator element
                    const scrollStatus = document.querySelector('#scroll-status');
                    if (!scrollStatus) return;

                    // Check if scroll indicator is visible in viewport
                    const rect = scrollStatus.getBoundingClientRect();
                    const windowHeight = window.innerHeight;

                    // Trigger when scroll indicator is 300px from entering the viewport
                    const isNearVisible = rect.top <= windowHeight + 300;

                    if (isNearVisible) {
                        console.log('Scroll indicator near visible, triggering load...'); // Debug log
                        loadMorePrompts();
                    }
                }, 50); // Reduced debounce for more responsive feel
            });
        }

        // Enhanced search functionality with server-side search
        function performSearch(searchTerm) {
            currentSearch = searchTerm;

            // Reset pagination for new search
            isLoading = false;
            hasMorePages = true;
            nextPageUrl = null;
            currentPage = 1;

            const promptsGrid = document.querySelector('#prompts-grid');
            const showingText = document.querySelector('#showing-text');

            // Show loading state
            promptsGrid.innerHTML =
                '<div class="col-span-full text-center py-8"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div><p class="mt-4 text-gray-600">{{ __('messages.prompts.loading') }}</p></div>';

            // Prepare request data
            const requestData = {};
            if (searchTerm) {
                requestData.search = searchTerm;
            }

            // Determine URL based on current filter
            const url = currentFilter === 'all' ? '/' : `/prompts/${currentFilter}`;

            fetch(url + '?' + new URLSearchParams(requestData), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update the prompts grid
                    promptsGrid.innerHTML = data.html;

                    // Update pagination state
                    hasMorePages = data.hasMorePages;
                    nextPageUrl = data.nextPageUrl;
                    currentPage = data.currentPage;

                    // Update showing text
                    if (showingText) {
                        const searchInfo = searchTerm ?
                            ` ({{ __('messages.prompts.search_results') }}: "${searchTerm}")` : '';
                        showingText.textContent =
                            `{{ __('messages.prompts.showing') }} ${data.count} {{ __('messages.prompts.of') }} ${data.total} {{ __('messages.prompts.prompts') }}${searchInfo}`;
                    }

                    // Update scroll status indicator
                    updateScrollStatus();
                })
                .catch(error => {
                    console.error('Error:', error);
                    promptsGrid.innerHTML =
                        '<div class="col-span-full text-center py-8 text-red-600">{{ __('messages.prompts.error') }}</div>';
                });
        }

        function bindSearchFunctionality() {
            const searchInput = document.querySelector('#search-input');
            if (searchInput) {
                // Remove existing event listeners
                const newSearchInput = searchInput.cloneNode(true);
                searchInput.parentNode.replaceChild(newSearchInput, searchInput);

                let searchTimeout;
                newSearchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.trim();

                    // Debounce search requests
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        performSearch(searchTerm);
                    }, 500); // Wait 500ms after user stops typing
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            bindSearchFunctionality();

            // Initialize pagination state from server
            const promptsGrid = document.querySelector('#prompts-grid');
            if (promptsGrid && promptsGrid.children.length > 0) {
                // Get initial pagination data from Laravel
                @if (isset($prompts) && $prompts instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    hasMorePages = {{ $prompts->hasMorePages() ? 'true' : 'false' }};
                    nextPageUrl = '{{ $prompts->nextPageUrl() }}';
                    currentPage = {{ $prompts->currentPage() }};
                @endif

                // Hide load more button since we're using infinite scroll
                hideLoadMoreButton();

                // Initialize infinite scroll
                initInfiniteScroll();

                // Update scroll status indicator
                updateScrollStatus();

                // Add scroll to top button for better UX
                addScrollToTopButton();
            }

            // Bind filter button clicks
            document.querySelectorAll('.filter-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const filterType = this.getAttribute('data-filter');
                    filterPrompts(filterType);
                });
            });
        });

        // Add a smooth scroll to top button for better UX when there's a lot of content
        function addScrollToTopButton() {
            const scrollBtn = document.createElement('button');
            scrollBtn.id = 'scroll-to-top';
            scrollBtn.className =
                'fixed bottom-6 right-6 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-all duration-300 opacity-0 pointer-events-none z-50';
            scrollBtn.innerHTML = `
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
            `;

            scrollBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            document.body.appendChild(scrollBtn);

            // Show/hide scroll to top button based on scroll position
            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) {
                    scrollBtn.style.opacity = '1';
                    scrollBtn.style.pointerEvents = 'auto';
                } else {
                    scrollBtn.style.opacity = '0';
                    scrollBtn.style.pointerEvents = 'none';
                }
            });
        }
    </script>
</body>

</html>
