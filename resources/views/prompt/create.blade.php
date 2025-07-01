@extends('layouts.app')

@section('title', 'Add New Prompt - Prompt Collection')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Add New Prompt</h1>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-6">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('prompt.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div>
                        <label for="content_type" class="block text-sm font-medium text-gray-700 mb-2">Content Type</label>
                        <select id="content_type" name="content_type"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Content Type</option>
                            <option value="text" {{ old('content_type') == 'text' ? 'selected' : '' }}>Text</option>
                            <option value="image" {{ old('content_type') == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ old('content_type') == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="category_id" name="category_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="prompt_text" class="block text-sm font-medium text-gray-700 mb-2">Prompt Text</label>
                        <textarea id="prompt_text" name="prompt_text" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ old('prompt_text') }}</textarea>
                    </div>

                    <div>
                        <label for="result_content" class="block text-sm font-medium text-gray-700 mb-2">Result
                            Content</label>
                        <textarea id="result_content" name="result_content" rows="8"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ old('result_content') }}</textarea>
                    </div>

                    <div id="image_url_field" style="display: none;">
                        <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                        <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div id="video_url_field" style="display: none;">
                        <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>
                        <input type="url" id="video_url" name="video_url" value="{{ old('video_url') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags
                            (comma-separated)</label>
                        <input type="text" id="tags" name="tags" value="{{ old('tags') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="tag1, tag2, tag3">
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" class="mr-2"
                            {{ old('is_featured') ? 'checked' : '' }}>
                        <label for="is_featured" class="text-sm font-medium text-gray-700">Featured Prompt</label>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
                            Create Prompt
                        </button>
                        <a href="{{ route('home') }}"
                            class="bg-gray-300 text-gray-700 px-6 py-3 rounded-md hover:bg-gray-400 transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('content_type').addEventListener('change', function() {
            const imageField = document.getElementById('image_url_field');
            const videoField = document.getElementById('video_url_field');

            // Hide all fields first
            imageField.style.display = 'none';
            videoField.style.display = 'none';

            // Show relevant field based on selection
            if (this.value === 'image') {
                imageField.style.display = 'block';
            } else if (this.value === 'video') {
                videoField.style.display = 'block';
            }
        });

        // Trigger on page load if there's old input
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('content_type').dispatchEvent(new Event('change'));
        });
    </script>
@endsection
