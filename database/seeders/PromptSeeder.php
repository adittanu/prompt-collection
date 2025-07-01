<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prompts = [
            [
                'title' => 'Abstract Digital Art',
                'prompt_text' => 'Create a vibrant abstract digital artwork with flowing colors and geometric shapes, incorporating gradients from blue to purple with golden accents',
                'result_content' => 'A stunning abstract composition with vibrant colors and dynamic shapes',
                'content_type' => 'image',
                'image_url' => 'https://krpjnzoc.manus.space/assets/background-CMMk0iMF.jpg',
                'category_id' => 1, // Digital Art
                'tags' => ['abstract', 'digital art', 'colorful', 'geometric'],
                'is_featured' => true,
            ],
            [
                'title' => 'Script Writing Guide',
                'prompt_text' => 'Write a comprehensive guide for creating engaging video scripts that capture audience attention and drive engagement',
                'result_content' => "# Complete Video Script Writing Guide\n\n## 1. Understanding Your Audience\n- Define your target demographic\n- Research their interests and pain points\n- Adapt your tone and style accordingly\n\n## 2. Story Structure\n- Hook: Grab attention in the first 5 seconds\n- Setup: Introduce the problem or topic\n- Conflict: Present challenges or obstacles\n- Resolution: Provide solutions or conclusions\n\n## 3. Writing Techniques\n- Use conversational language\n- Include emotional triggers\n- Add visual cues for editors\n- Keep sentences short and punchy\n\n## 4. Call-to-Action\n- Be clear and specific\n- Create urgency when appropriate\n- Make it easy to follow through\n\n## 5. Templates and Examples\n- Educational content template\n- Entertainment script structure\n- Product demonstration format",
                'content_type' => 'text',
                'category_id' => 2, // Writing
                'tags' => ['writing', 'video', 'content creation', 'storytelling'],
                'is_featured' => false,
            ],
            [
                'title' => 'React.js Learning Path',
                'prompt_text' => 'Create a comprehensive step-by-step tutorial for learning React.js from beginner to intermediate level',
                'result_content' => "# React.js Complete Learning Path\n\n## Phase 1: Foundations (Week 1-2)\n- JavaScript ES6+ fundamentals\n- Understanding the DOM\n- Introduction to React concepts\n\n## Phase 2: Core Concepts (Week 3-4)\n- Components and JSX\n- Props and state management\n- Event handling and forms\n- Conditional rendering and lists\n\n## Phase 3: Advanced Features (Week 5-6)\n- React Hooks (useState, useEffect, useContext)\n- Custom hooks creation\n- Component lifecycle\n- Error boundaries\n\n## Phase 4: State Management (Week 7-8)\n- Context API\n- Redux basics\n- State management patterns\n- Performance optimization\n\n## Phase 5: Real-world Application (Week 9-10)\n- Building a complete project\n- API integration\n- Testing with Jest\n- Deployment strategies\n\n## Resources:\n- Official React documentation\n- Practice projects and exercises\n- Community forums and support",
                'content_type' => 'text',
                'category_id' => 3, // Tutorials
                'tags' => ['react', 'javascript', 'web development', 'tutorial'],
                'is_featured' => true,
            ],
            [
                'title' => 'Online Teaching Methodology',
                'prompt_text' => 'Develop a comprehensive teaching methodology for effective online education that maximizes student engagement',
                'result_content' => "# Modern Online Teaching Methodology\n\n## 1. Interactive Learning Strategies\n- Live polls and quizzes during sessions\n- Breakout rooms for small group discussions\n- Gamification elements and rewards\n- Real-time Q&A sessions\n\n## 2. Multimedia Content Integration\n- Video lectures with visual aids\n- Interactive presentations\n- Screen sharing and demonstrations\n- Virtual whiteboards and collaboration tools\n\n## 3. Assessment Techniques\n- Formative assessments throughout lessons\n- Peer review and feedback systems\n- Project-based evaluations\n- Self-assessment tools\n\n## 4. Student Engagement Methods\n- Regular check-ins and feedback\n- Discussion forums and chat features\n- Virtual office hours\n- Collaborative projects and assignments\n\n## 5. Technology Tools\n- Learning Management Systems (LMS)\n- Video conferencing platforms\n- Interactive content creation tools\n- Progress tracking and analytics\n\n## 6. Best Practices\n- Clear communication guidelines\n- Structured lesson plans\n- Regular breaks and variety\n- Accessibility considerations",
                'content_type' => 'text',
                'category_id' => 4, // Education
                'tags' => ['education', 'online learning', 'teaching', 'methodology'],
                'is_featured' => false,
            ],
            [
                'title' => 'Professional Website Banner',
                'prompt_text' => 'Design a modern, professional website banner with clean typography and contemporary design elements',
                'result_content' => 'Clean and professional banner design for modern websites',
                'content_type' => 'image',
                'image_url' => 'https://krpjnzoc.manus.space/assets/banner-DROBM898.jpg',
                'category_id' => 5, // Web Design
                'tags' => ['web design', 'banner', 'professional', 'modern'],
                'is_featured' => false,
            ],
            [
                'title' => 'Python Data Analysis Tutorial',
                'prompt_text' => 'Create a beginner-friendly tutorial for data analysis using Python, pandas, and matplotlib',
                'result_content' => "# Python Data Analysis Tutorial\n\n## Getting Started\n- Install Python and required libraries\n- Set up Jupyter Notebook environment\n- Import essential libraries (pandas, numpy, matplotlib)\n\n## Data Loading and Exploration\n- Reading CSV, Excel, and JSON files\n- Basic data inspection methods\n- Understanding data types and structure\n\n## Data Cleaning\n- Handling missing values\n- Removing duplicates\n- Data type conversions\n- Outlier detection and treatment\n\n## Data Analysis Techniques\n- Descriptive statistics\n- Grouping and aggregation\n- Filtering and sorting\n- Correlation analysis\n\n## Data Visualization\n- Creating basic plots with matplotlib\n- Advanced visualizations with seaborn\n- Interactive plots with plotly\n- Best practices for data presentation\n\n## Practical Project\n- Complete analysis of a real dataset\n- Step-by-step walkthrough\n- Common pitfalls and solutions",
                'content_type' => 'text',
                'category_id' => 6, // Data Analysis
                'tags' => ['python', 'data analysis', 'pandas', 'tutorial'],
                'is_featured' => true,
            ],
            [
                'title' => 'Social Media Strategy Guide',
                'prompt_text' => 'Develop a comprehensive social media strategy guide for small businesses and content creators',
                'result_content' => "# Complete Social Media Strategy Guide\n\n## 1. Platform Selection\n- Understand each platform's audience\n- Choose 2-3 platforms to focus on\n- Align platform choice with business goals\n\n## 2. Content Planning\n- Create a content calendar\n- Mix of educational, entertaining, and promotional content\n- User-generated content strategies\n- Trending topics and hashtag research\n\n## 3. Engagement Strategies\n- Respond to comments and messages promptly\n- Create interactive content (polls, Q&As)\n- Collaborate with other creators\n- Build a community around your brand\n\n## 4. Analytics and Optimization\n- Track key performance metrics\n- A/B test different content types\n- Optimize posting times and frequency\n- Adjust strategy based on data insights\n\n## 5. Growth Tactics\n- Consistent posting schedule\n- Cross-platform promotion\n- Influencer partnerships\n- Paid advertising strategies",
                'content_type' => 'text',
                'category_id' => 7, // Marketing
                'tags' => ['social media', 'marketing', 'strategy', 'business'],
                'is_featured' => false,
            ],
            [
                'title' => 'Motion Graphics Animation',
                'prompt_text' => 'Create a dynamic motion graphics animation showcasing modern design principles with smooth transitions',
                'result_content' => 'Professional motion graphics with kinetic typography and smooth animations',
                'content_type' => 'video',
                'video_url' => '#',
                'category_id' => 8, // Motion Graphics
                'tags' => ['motion graphics', 'animation', 'video', 'design'],
                'is_featured' => false,
            ],
        ];

        foreach ($prompts as $prompt) {
            \App\Models\Prompt::create($prompt);
        }
    }
}
