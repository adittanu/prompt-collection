<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $prompts = Prompt::with('category')->latest()->get();
        $categories = Category::all();
        $stats = [
            'total_prompts' => Prompt::count(),
            'content_types' => Prompt::distinct('content_type')->count('content_type'),
            'image_count' => Prompt::where('content_type', 'image')->count(),
            'video_count' => Prompt::where('content_type', 'video')->count(),
            'text_count' => Prompt::where('content_type', 'text')->count(),
        ];

        return view('home', compact('prompts', 'categories', 'stats'));
    }

    public function filterByType($type)
    {
        $prompts = Prompt::with('category')
            ->where('content_type', $type)
            ->latest()
            ->get();
        $categories = Category::all();

        $stats = [
            'total_prompts' => Prompt::count(),
            'content_types' => Prompt::distinct('content_type')->count('content_type'),
            'image_count' => Prompt::where('content_type', 'image')->count(),
            'video_count' => Prompt::where('content_type', 'video')->count(),
            'text_count' => Prompt::where('content_type', 'text')->count(),
        ];

        return view('home', compact('prompts', 'categories', 'stats'));
    }
}
