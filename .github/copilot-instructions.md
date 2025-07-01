<!-- Use this file to provide workspace-specific custom instructions to Copilot. For more details, visit https://code.visualstudio.com/docs/copilot/copilot-customization#_use-a-githubcopilotinstructionsmd-file -->

# Laravel Prompt Collection Project

This is a Laravel 12 application that replicates a React-based prompt collection website. The application showcases AI-generated prompts and their results across different content types (text, images, videos).

## Key Features

-   Browse and filter prompts by content type
-   View detailed prompt and result information
-   Add new prompts through an admin interface
-   Responsive design with Tailwind CSS
-   Copy prompt functionality
-   Category-based organization

## Database Structure

-   `prompts` table: stores prompt information, results, and metadata
-   `categories` table: organizes prompts into different categories
-   Relationships: prompts belong to categories

## Frontend

-   Uses Blade templating engine
-   Styled with Tailwind CSS for modern, responsive design
-   Interactive JavaScript for copy functionality and form behavior

## Development Guidelines

-   Follow Laravel best practices and conventions
-   Use Eloquent ORM for database interactions
-   Implement proper validation for forms
-   Maintain responsive design principles
-   Keep code organized and well-documented
