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
            transition: all 0.2s ease;
        }

        .copy-btn:hover {
            background-color: #3b82f6;
            transform: scale(1.05);
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
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 font-medium">{{ __('messages.nav.home') }}</a>
                    <a href="{{ route('home') }}#prompts"
                        class="text-gray-700 hover:text-gray-900 font-medium">{{ __('messages.nav.prompts') }}</a>
                    <a href="{{ route('home') }}#about" class="text-gray-700 hover:text-gray-900 font-medium">{{ __('messages.nav.about') }}</a>
                    
                    <!-- Language Switcher -->
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-gray-900 font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                            </svg>
                            {{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
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
                            <span>{{ __('messages.about.visual_content') }} - {{ __('messages.about.visual_desc') }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-indigo-500 rounded-full mr-3"></span>
                            <span>{{ __('messages.about.educational_content') }} - {{ __('messages.about.educational_desc') }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></span>
                            <span>{{ __('messages.about.video_content') }} - {{ __('messages.about.video_desc') }}</span>
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
    </footer>    <!-- JavaScript for copy functionality and filtering -->
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Show success message
                const button = event.target;
                const originalText = button.textContent;
                button.textContent = '{{ __("messages.prompts.copied") }}';
                button.classList.add('bg-green-500');

                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('bg-green-500');
                }, 2000);
            });
        }

        // Filter functionality without page refresh
        function filterPrompts(type) {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const promptsGrid = document.querySelector('#prompts-grid');
            const showingText = document.querySelector('#showing-text');
            
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
            promptsGrid.innerHTML = '<div class="col-span-full text-center py-8"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div><p class="mt-4 text-gray-600">Loading...</p></div>';

            // Fetch filtered data
            const url = type === 'all' ? '/' : `/prompts/${type}`;
            
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                // Update the prompts grid
                promptsGrid.innerHTML = data.html;
                
                // Update showing text
                if (showingText) {
                    showingText.textContent = `{{ __("messages.prompts.showing") }} ${data.count} {{ __("messages.prompts.of") }} ${data.total} {{ __("messages.prompts.prompts") }}`;
                }
                
                // Re-bind search functionality
                bindSearchFunctionality();
            })
            .catch(error => {
                console.error('Error:', error);
                promptsGrid.innerHTML = '<div class="col-span-full text-center py-8 text-red-600">Error loading prompts</div>';
            });
        }

        // Search functionality
        function bindSearchFunctionality() {
            const searchInput = document.querySelector('#search-input');
            if (searchInput) {
                // Remove existing event listeners
                const newSearchInput = searchInput.cloneNode(true);
                searchInput.parentNode.replaceChild(newSearchInput, searchInput);
                
                newSearchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const cards = document.querySelectorAll('.card-hover');

                    cards.forEach(card => {
                        const title = card.querySelector('h3').textContent.toLowerCase();
                        const content = card.querySelector('.text-gray-600').textContent.toLowerCase();
                        const tags = Array.from(card.querySelectorAll('.bg-gray-100')).map(tag =>
                            tag.textContent.toLowerCase()).join(' ');

                        if (title.includes(searchTerm) || content.includes(searchTerm) || tags.includes(searchTerm)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            bindSearchFunctionality();
            
            // Bind filter button clicks
            document.querySelectorAll('.filter-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const filterType = this.getAttribute('data-filter');
                    filterPrompts(filterType);
                });
            });
        });
    </script>
</body>

</html>
