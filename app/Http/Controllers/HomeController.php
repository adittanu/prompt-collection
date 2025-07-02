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
        $query = Prompt::with('category')->latest();

        // Add search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prompt', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('result', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('tags', 'LIKE', "%{$searchTerm}%");
            });
        }

        $prompts = $query->paginate($perPage);
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
                'total' => $prompts->total(),
                'hasMorePages' => $prompts->hasMorePages(),
                'nextPageUrl' => $prompts->nextPageUrl(),
                'currentPage' => $prompts->currentPage()
            ]);
        }

        return view('home', compact('prompts', 'categories', 'stats'));
    }

    public function filterByType($type, Request $request)
    {
        $perPage = 12; // Show 12 prompts per page
        $query = Prompt::with('category')
            ->where('content_type', $type)
            ->latest();

        // Add search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prompt', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('result', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('tags', 'LIKE', "%{$searchTerm}%");
            });
        }

        $prompts = $query->paginate($perPage);
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
                'total' => $prompts->total(),
                'hasMorePages' => $prompts->hasMorePages(),
                'nextPageUrl' => $prompts->nextPageUrl(),
                'currentPage' => $prompts->currentPage()
            ]);
        }

        return view('home', compact('prompts', 'categories', 'stats'));
    }
}
