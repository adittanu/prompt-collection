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
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 font-medium">Home</a>
                    <a href="{{ route('home') }}#prompts"
                        class="text-gray-700 hover:text-gray-900 font-medium">Prompts</a>
                    <a href="{{ route('home') }}#about" class="text-gray-700 hover:text-gray-900 font-medium">About</a>
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
                    <h3 class="text-lg font-bold mb-4">About Adit Tanu</h3>
                    <p class="text-gray-300">Founder and creator of this prompt collection website. Adit Tanu is
                        passionate about exploring the creative possibilities of AI-generated content and sharing
                        innovative prompts with the community.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Content Types</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                            <span>Visual Content - Creating stunning images and graphics</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-indigo-500 rounded-full mr-3"></span>
                            <span>Educational Content - Comprehensive guides and tutorials</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></span>
                            <span>Video Content - Dynamic animations and motion graphics</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Collection</h3>
                    <p class="text-gray-300">This collection showcases various types of prompts and their results,
                        including stunning visual art, comprehensive tutorials, educational guides, and creative
                        scripts. Each prompt is carefully crafted to demonstrate the potential of AI-assisted
                        creativity.</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; 2025 Prompt Collection by Adit Tanu. All rights reserved.</p>
                <p class="text-gray-400 mt-2">Showcasing the power of creative prompts and AI-generated content</p>
            </div>
        </div>
    </footer> <!-- JavaScript for copy functionality -->
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Show success message
                const button = event.target;
                const originalText = button.textContent;
                button.textContent = 'Copied!';
                button.classList.add('bg-green-500');

                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('bg-green-500');
                }, 2000);
            });
        }

        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[type="text"]');
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const cards = document.querySelectorAll('.card-hover');

                    cards.forEach(card => {
                        const title = card.querySelector('h3').textContent.toLowerCase();
                        const content = card.querySelector('.text-gray-600').textContent
                            .toLowerCase();
                        const tags = Array.from(card.querySelectorAll('.bg-gray-100')).map(tag =>
                            tag.textContent.toLowerCase()).join(' ');

                        if (title.includes(searchTerm) || content.includes(searchTerm) || tags
                            .includes(searchTerm)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
</body>

</html>
