<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Digital Art', 'slug' => 'digital-art', 'color' => '#10b981'],
            ['name' => 'Writing', 'slug' => 'writing', 'color' => '#6366f1'],
            ['name' => 'Tutorials', 'slug' => 'tutorials', 'color' => '#8b5cf6'],
            ['name' => 'Education', 'slug' => 'education', 'color' => '#f59e0b'],
            ['name' => 'Web Design', 'slug' => 'web-design', 'color' => '#ef4444'],
            ['name' => 'Data Analysis', 'slug' => 'data-analysis', 'color' => '#06b6d4'],
            ['name' => 'Marketing', 'slug' => 'marketing', 'color' => '#84cc16'],
            ['name' => 'Motion Graphics', 'slug' => 'motion-graphics', 'color' => '#f97316'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
