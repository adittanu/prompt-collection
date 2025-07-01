#!/bin/bash

# Prompt Collection Laravel Setup Script

echo "🚀 Setting up Prompt Collection Laravel Application..."
echo ""

# Check if composer is installed
if ! command -v composer &> /dev/null; then
    echo "❌ Composer is not installed. Please install Composer first."
    echo "Visit: https://getcomposer.org/download/"
    exit 1
fi

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "❌ PHP is not installed. Please install PHP 8.2 or higher."
    exit 1
fi

echo "✅ Prerequisites check passed"
echo ""

# Install composer dependencies
echo "📦 Installing Composer dependencies..."
composer install
echo ""

# Copy environment file
if [ ! -f .env ]; then
    echo "⚙️ Setting up environment file..."
    cp .env.example .env
    echo ""
fi

# Generate application key
echo "🔐 Generating application key..."
php artisan key:generate
echo ""

# Run migrations
echo "🗄️ Setting up database..."
php artisan migrate
echo ""

# Seed database
echo "🌱 Seeding database with sample data..."
php artisan db:seed
echo ""

echo "✅ Setup complete!"
echo ""
echo "🌐 To start the application, run:"
echo "   php artisan serve"
echo ""
echo "📖 Then visit: http://localhost:8000"
echo ""
echo "🎯 Original website: https://krpjnzoc.manus.space/"
echo "📝 Documentation: README.md"
