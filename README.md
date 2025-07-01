# Prompt Collection - Laravel Website

A Laravel 12 application that replicates a React-based prompt collection website. This application showcases AI-generated prompts and their results across different content types (text, images, videos).

## 🚀 Features

-   **Browse Prompts**: View a curated collection of AI prompts and their results
-   **Filter by Type**: Filter prompts by content type (text, image, video)
-   **Category Organization**: Prompts organized into different categories
-   **Add New Prompts**: Admin interface for adding new prompts
-   **Copy Functionality**: Easy copy-to-clipboard for prompt text
-   **Responsive Design**: Modern, mobile-friendly design with Tailwind CSS
-   **Statistics Dashboard**: View collection statistics and metrics

## 🛠️ Technology Stack

-   **Backend**: Laravel 12
-   **Frontend**: Blade Templates with Tailwind CSS
-   **Database**: SQLite (default) / MySQL / PostgreSQL
-   **Styling**: Tailwind CSS
-   **JavaScript**: Vanilla JS for interactivity

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   └── PromptController.php
│   └── Models/
│       ├── Category.php
│       └── Prompt.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php
│   ├── prompt/
│   │   └── create.blade.php
│   └── home.blade.php
└── routes/
    └── web.php
```

## 🚀 Getting Started

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js and npm (optional, for asset compilation)

### Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd prompt-collection
    ```

2. **Install dependencies**

    ```bash
    composer install
    ```

3. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database setup**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

5. **Start the development server**

    ```bash
    php artisan serve
    ```

6. **Visit the application**
   Open your browser and go to `http://localhost:8000`

## 📊 Database Schema

### Categories Table

-   `id` - Primary key
-   `name` - Category name
-   `slug` - URL-friendly slug
-   `color` - Category color (hex)
-   `timestamps`

### Prompts Table

-   `id` - Primary key
-   `title` - Prompt title
-   `prompt_text` - The actual prompt
-   `result_content` - Generated result content
-   `content_type` - Type (text, image, video)
-   `image_url` - Image URL (nullable)
-   `video_url` - Video URL (nullable)
-   `tags` - JSON array of tags
-   `category_id` - Foreign key to categories
-   `is_featured` - Boolean for featured prompts
-   `timestamps`

## 🎨 Content Types

1. **Text**: Comprehensive guides, tutorials, and written content
2. **Image**: Digital art, banners, and visual designs
3. **Video**: Motion graphics and animations

## 🔧 Usage

### Adding New Prompts

1. Navigate to `/create`
2. Fill in the prompt details:
    - Title
    - Content Type (Text/Image/Video)
    - Category
    - Prompt Text
    - Result Content
    - Optional: Image/Video URLs, Tags
3. Submit the form

### Viewing Prompts

-   Visit the homepage to see all prompts
-   Use filter buttons to view specific content types
-   Click on prompts to view detailed information

## 🎯 Original Website

This Laravel application replicates the functionality of: https://krpjnzoc.manus.space/

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
