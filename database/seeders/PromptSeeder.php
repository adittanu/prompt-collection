<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prompt;

class PromptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define base prompts for variety
        $basePrompts = [
            // Image prompts
            [
                'title' => 'Abstract Digital Art',
                'prompt_text' => 'Create a vibrant abstract digital artwork with flowing colors and geometric shapes, incorporating gradients from blue to purple with golden accents',
                'result_content' => 'A stunning abstract composition with vibrant colors and dynamic shapes',
                'content_type' => 'image',
                'image_url' => 'https://picsum.photos/400/300?random=1',
                'category_id' => 1,
                'tags' => ['abstract', 'digital art', 'colorful', 'geometric'],
                'is_featured' => true,
            ],
            [
                'title' => 'Futuristic City Landscape',
                'prompt_text' => 'Design a futuristic cityscape with flying cars, neon lights, and towering skyscrapers against a sunset sky',
                'result_content' => 'A breathtaking vision of urban future with advanced technology',
                'content_type' => 'image',
                'image_url' => 'https://picsum.photos/400/300?random=2',
                'category_id' => 1,
                'tags' => ['futuristic', 'city', 'sci-fi', 'landscape'],
                'is_featured' => false,
            ],
            [
                'title' => 'React.js Learning Path',
                'prompt_text' => 'Create a comprehensive step-by-step tutorial for learning React.js from beginner to intermediate level',
                'result_content' => "# React.js Complete Learning Path\n\n## Phase 1: Foundations\n- JavaScript ES6+ fundamentals\n- Understanding the DOM\n- Introduction to React concepts\n\nComplete tutorial with practical examples and exercises.",
                'content_type' => 'text',
                'category_id' => 3,
                'tags' => ['react', 'javascript', 'tutorial', 'web development'],
                'is_featured' => true,
            ],
            [
                'title' => 'Product Demo Animation',
                'prompt_text' => 'Create an engaging product demonstration video showing the key features and benefits of a mobile app',
                'result_content' => 'A dynamic video showcasing app functionality with smooth animations and clear explanations',
                'content_type' => 'video',
                'category_id' => 5,
                'tags' => ['product demo', 'animation', 'mobile app', 'video'],
                'is_featured' => false,
            ],
        ];

        // Additional prompt templates for bulk generation
        $promptTemplates = [
            'image' => [
                'titles' => [
                    'Artistic Portrait', 'Nature Photography', 'Urban Architecture', 'Food Styling', 'Product Photography',
                    'Landscape Scene', 'Character Design', 'Infographic Design', 'Social Media Graphics', 'Book Cover Design',
                    'Website Banner', 'Logo Concept', 'Icon Set', 'Illustration Style', 'Digital Painting',
                    'Photo Manipulation', 'Poster Design', 'Brand Identity', 'User Interface', 'Mobile App Design'
                ],
                'prompts' => [
                    'Create a stunning visual composition with modern design principles',
                    'Design an eye-catching graphic with bold colors and clean typography',
                    'Develop a creative concept that captures attention and communicates effectively',
                    'Produce a professional image with high-quality visual elements',
                    'Generate an artistic piece that combines creativity with functionality'
                ],
                'results' => [
                    'A visually striking composition that exceeds creative expectations',
                    'A professional design that perfectly balances aesthetics and functionality',
                    'An innovative visual solution that captures the essence of the concept',
                    'A high-quality image that demonstrates exceptional creative skill',
                    'A compelling visual narrative that engages and inspires viewers'
                ]
            ],
            'text' => [
                'titles' => [
                    'SEO Content Strategy', 'Email Marketing Guide', 'Social Media Plan', 'Blog Writing Tips', 'Copywriting Techniques',
                    'Technical Documentation', 'User Manual Creation', 'Marketing Copy', 'Press Release Writing', 'Newsletter Content',
                    'Website Content', 'Product Descriptions', 'Landing Page Copy', 'Ad Campaign Text', 'Brand Messaging',
                    'Content Calendar', 'Editorial Guidelines', 'Style Guide Creation', 'Storytelling Framework', 'Writing Workshop'
                ],
                'prompts' => [
                    'Write comprehensive content that provides value and engages the target audience',
                    'Create informative text that educates readers while maintaining their interest',
                    'Develop persuasive copy that drives action and achieves business objectives',
                    'Produce well-researched content that establishes authority and builds trust',
                    'Generate engaging text that connects with readers on an emotional level'
                ],
                'results' => [
                    'Comprehensive content that delivers exceptional value to readers while achieving strategic goals',
                    'Well-crafted text that perfectly balances information with engagement and readability',
                    'Persuasive copy that effectively communicates key messages and drives desired actions',
                    'Professional content that establishes credibility and builds lasting audience relationships',
                    'Compelling narrative that resonates with target audiences and supports business objectives'
                ]
            ],
            'video' => [
                'titles' => [
                    'Brand Story Video', 'Tutorial Series', 'Product Launch', 'Company Culture', 'Customer Testimonials',
                    'Animated Explainer', 'Training Video', 'Event Coverage', 'Social Media Content', 'Documentary Style',
                    'Promotional Campaign', 'How-to Guide', 'Behind the Scenes', 'Live Streaming', 'Video Podcast',
                    'Motion Graphics', 'Commercial Ad', 'Educational Series', 'Interview Format', 'Virtual Event'
                ],
                'prompts' => [
                    'Produce engaging video content that tells a compelling story and connects with viewers',
                    'Create informative video material that educates while maintaining audience engagement',
                    'Develop dynamic video content that showcases products or services effectively',
                    'Generate professional video content that builds brand awareness and trust',
                    'Create entertaining video content that goes viral and increases reach'
                ],
                'results' => [
                    'High-quality video content that effectively communicates key messages and engages target audiences',
                    'Professional video production that showcases expertise and builds credibility with viewers',
                    'Compelling visual storytelling that creates emotional connections and drives viewer action',
                    'Dynamic video content that stands out in crowded feeds and generates meaningful engagement',
                    'Polished video material that reflects brand values and supports marketing objectives'
                ]
            ]
        ];

        // Generate 100 prompts
        $generatedPrompts = [];
        
        // Add base prompts first
        foreach ($basePrompts as $prompt) {
            $generatedPrompts[] = $prompt;
        }

        // Generate additional prompts to reach 100
        $currentCount = count($basePrompts);
        $randomIndex = 1;

        while ($currentCount < 100) {
            foreach (['image', 'text', 'video'] as $type) {
                if ($currentCount >= 100) break;

                $templates = $promptTemplates[$type];
                $titleIndex = $randomIndex % count($templates['titles']);
                $promptIndex = $randomIndex % count($templates['prompts']);
                $resultIndex = $randomIndex % count($templates['results']);

                $prompt = [
                    'title' => $templates['titles'][$titleIndex] . ' #' . $randomIndex,
                    'prompt_text' => $templates['prompts'][$promptIndex],
                    'result_content' => $templates['results'][$resultIndex],
                    'content_type' => $type,
                    'category_id' => rand(1, 5),
                    'tags' => $this->generateRandomTags($type),
                    'is_featured' => rand(0, 10) < 2, // 20% chance of being featured
                ];

                if ($type === 'image') {
                    $prompt['image_url'] = 'https://picsum.photos/400/300?random=' . ($randomIndex + 100);
                }

                $generatedPrompts[] = $prompt;
                $currentCount++;
                $randomIndex++;
            }
        }

        // Insert all prompts
        foreach ($generatedPrompts as $promptData) {
            Prompt::create($promptData);
        }
    }

    private function generateRandomTags($contentType)
    {
        $tagPools = [
            'image' => ['design', 'creative', 'visual', 'art', 'graphics', 'professional', 'modern', 'colorful', 'minimal', 'bold'],
            'text' => ['writing', 'content', 'marketing', 'guide', 'tutorial', 'strategy', 'tips', 'best practices', 'professional', 'comprehensive'],
            'video' => ['video', 'animation', 'production', 'storytelling', 'visual', 'engaging', 'professional', 'dynamic', 'creative', 'marketing']
        ];

        $tags = $tagPools[$contentType];
        $selectedTags = array_rand(array_flip($tags), rand(3, 5));
        return is_array($selectedTags) ? $selectedTags : [$selectedTags];
    }
}
