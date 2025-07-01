@foreach ($prompts as $prompt)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden card-hover">
        <!-- Header with title and badge -->
        <div class="p-6 pb-4">
            <div class="flex items-start justify-between mb-3">
                <h3 class="text-xl font-bold text-gray-900 flex-1">{{ $prompt->title }}</h3>
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ml-3
            @if ($prompt->content_type == 'image') bg-green-100 text-green-800
            @elseif($prompt->content_type == 'video') bg-yellow-100 text-yellow-800
            @else bg-blue-100 text-blue-800 @endif">
                    @if ($prompt->content_type == 'image')
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    @elseif($prompt->content_type == 'video')
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                    @else
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    @endif
                    {{ $prompt->content_type }}
                </span>
            </div>
            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($prompt->result_content, 100) }}</p>
        </div>

        <!-- Prompt Section -->
        <div class="px-6 pb-4">
            <div class="flex items-center justify-between mb-3">
                <h4 class="font-semibold text-gray-900">{{ __('messages.prompts.prompt_label') }}</h4>
                <button onclick="copyToClipboard('{{ addslashes($prompt->prompt_text) }}')"
                    class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('messages.prompts.copy') }}
                </button>
            </div>
            <div class="bg-gray-50 p-3 rounded-lg">
                <p class="text-sm text-gray-700">{{ $prompt->prompt_text }}</p>
            </div>
        </div>

        <!-- Result Section -->
        <div class="px-6 pb-6">
            <h4 class="font-semibold text-gray-900 mb-3">{{ __('messages.prompts.result_label') }}</h4>

            @if ($prompt->content_type == 'image' && $prompt->image_url)
                <div class="bg-gray-900 rounded-lg overflow-hidden mb-4">
                    <img src="{{ $prompt->image_url }}" alt="{{ $prompt->title }}" class="w-full h-48 object-cover">
                </div>
                <div class="text-right">
                    <a href="{{ $prompt->image_url }}" target="_blank"
                        class="text-blue-600 text-sm hover:underline">{{ __('messages.prompts.view_full_size') }}</a>
                </div>
            @elseif($prompt->content_type == 'video')
                <div class="bg-gray-100 rounded-lg p-8 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-gray-600">{{ __('messages.prompts.video_placeholder') }}</p>
                </div>
            @else
                <div class="bg-gray-50 p-4 rounded-lg max-h-48 overflow-y-auto">
                    <div class="prose prose-sm max-w-none">
                        {!! nl2br(e(Str::limit($prompt->result_content, 500))) !!}
                    </div>
                </div>
            @endif

            <!-- Tags -->
            @if ($prompt->tags && count($prompt->tags) > 0)
                <div class="flex flex-wrap gap-2 mt-4">
                    @foreach ($prompt->tags as $tag)
                        <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endforeach
