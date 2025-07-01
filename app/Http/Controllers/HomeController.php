<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 12; // Show 12 prompts per page
        $prompts = Prompt::with('category')->latest()->paginate($perPage);
        $categories = Category::all();
        $stats = [
            'total_prompts' => Prompt::count(),
            'content_types' => Prompt::distinct('content_type')->count('content_type'),
            'image_count' => Prompt::where('content_type', 'image')->count(),
            'video_count' => Prompt::where('content_type', 'video')->count(),
            'text_count' => Prompt::where('content_type', 'text')->count(),
        ];

        // If it's an AJAX request, return JSON
        if ($request->ajax()) {
            $html = view('partials.prompt-cards', compact('prompts'))->render();
            return response()->json([
                'html' => $html,
                'count' => $prompts->count(),
                'total' => $stats['total_prompts'],
                'hasMorePages' => $prompts->hasMorePages(),
                'nextPageUrl' => $prompts->nextPageUrl()
            ]);
        }

        return view('home', compact('prompts', 'categories', 'stats'));
    }

    public function filterByType($type, Request $request)
    {
        $perPage = 12; // Show 12 prompts per page
        $prompts = Prompt::with('category')
            ->where('content_type', $type)
            ->latest()
            ->paginate($perPage);
        $categories = Category::all();

        $stats = [
            'total_prompts' => Prompt::count(),
            'content_types' => Prompt::distinct('content_type')->count('content_type'),
            'image_count' => Prompt::where('content_type', 'image')->count(),
            'video_count' => Prompt::where('content_type', 'video')->count(),
            'text_count' => Prompt::where('content_type', 'text')->count(),
        ];

        // If it's an AJAX request, return JSON
        if ($request->ajax()) {
            $html = view('partials.prompt-cards', compact('prompts'))->render();
            return response()->json([
                'html' => $html,
                'count' => $prompts->count(),
                'total' => $stats['total_prompts'],
                'hasMorePages' => $prompts->hasMorePages(),
                'nextPageUrl' => $prompts->nextPageUrl()
            ]);
        }

        return view('home', compact('prompts', 'categories', 'stats'));
    }
}
