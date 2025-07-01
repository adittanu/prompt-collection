<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Category;
use Illuminate\Http\Request;

class PromptController extends Controller
{
    public function show($id)
    {
        $prompt = Prompt::with('category')->findOrFail($id);
        return view('prompt.show', compact('prompt'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('prompt.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'prompt_text' => 'required|string',
            'result_content' => 'required|string',
            'content_type' => 'required|in:text,image,video',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'tags' => 'nullable|string',
        ]);

        $tags = $request->tags ? explode(',', $request->tags) : [];

        Prompt::create([
            'title' => $request->title,
            'prompt_text' => $request->prompt_text,
            'result_content' => $request->result_content,
            'content_type' => $request->content_type,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url,
            'video_url' => $request->video_url,
            'tags' => $tags,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('home')->with('success', 'Prompt created successfully!');
    }
}
