# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Maylancer is a Laravel 10 application serving as the official website for Maylancer. The application features a custom documentation system that pulls and displays documentation from GitHub repositories, a blog system, product showcases, and open-source project listings.

## Development Commands

### Setup
```bash
# Initial setup
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

# Or use the composer setup script
composer setup
```

### Running the Application
```bash
# Start development server
php artisan serve

# Compile frontend assets
npm run dev      # Development with hot reload
npm run build    # Production build
```

### Testing
```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test --filter=TestClassName

# Run with coverage (if configured)
vendor/bin/phpunit --coverage-html coverage
```

### Code Quality
```bash
# Format code with Laravel Pint
./vendor/bin/pint

# Fix specific files
./vendor/bin/pint path/to/file.php
```

### Documentation Management
```bash
# Update all documentation from GitHub
php artisan docs:update

# Update specific doc
php artisan docs:update {doc}

# Update specific doc version
php artisan docs:update {doc} {version}
```

## Architecture

### Documentation System

The application includes a custom documentation management system that:

1. **Pulls documentation from GitHub repositories** defined in `docs.yml` at the project root
2. **Clones repositories** into `storage/docs-temp/` for processing
3. **Extracts markdown files** from the `docs/` directory of each repository
4. **Supports multiple versions** by checking out different git branches
5. **Stores processed docs** in `storage/docs/{doc}/{version}/`
6. **Serves images** from `public/images/docs/{doc}/{version}/images/`

Key files:
- `app/Documentation.php` - Core documentation service (parsing, caching, version management)
- `app/Console/Commands/UpdateDocs.php` - Command to pull docs from GitHub
- `app/Services/Git.php` & `app/Services/GitRepository.php` - Custom Git wrappers (extends czproject/git-php)
- `app/Http/Controllers/Docs/DocsController.php` - Documentation display controller
- `config/docs.php` - Documentation paths configuration
- `docs.yml` - Documentation repositories configuration

The documentation system:
- Caches parsed markdown (except in local environment)
- Uses Symfony DomCrawler for TOC extraction
- Replaces markdown link paths to work with Laravel routes
- Handles image path rewrites for proper asset loading
- Supports YAML front matter in markdown files

### Frontend Stack

- **Livewire 3.2** - For reactive components
- **Alpine.js 3.4** - For lightweight JavaScript interactions
- **Tailwind CSS 3.1** - For styling
- **Flowbite 1.6** - For UI components
- **Blade components** from blade-ui-kit, blade-heroicons, blade-fontawesome, etc.
- **Vite** - For asset bundling

### Content Management

- **Laravel Nova 4.0** - Admin panel (requires license)
- **Spatie Media Library** - File uploads and media management
- **Spatie Tags** - Tagging system for posts
- **Spatie Markdown** - Markdown rendering with Shiki syntax highlighting

### Key Models

Based on migrations, the application has these main models:
- `User` - User authentication
- `Post` - Blog posts with categories and tags
- `Category` - Post categories
- `Product` - Product listings
- `CustomerTestimony` - Customer testimonials
- `Setting` - Application settings

### Configuration Files

- `config/maylancer.php` - Products and open-source projects configuration
- `config/docs.php` - Documentation storage paths
- `config/markdown.php` - Markdown rendering configuration
- `config/torchlight.php` - Syntax highlighting configuration

### Helper Functions

Global helpers are defined in `app/helpers.php`:
- `current_user()` - Get authenticated user
- `gravatar_img($name)` - Generate Gravatar image tag
- `is_office_open()` - Check if office hours (9am-5:30pm weekdays)
- `mailto($subject, $body)` - Generate mailto links
- `formatBytes($size)` - Format file sizes
- `getDomain($url)` - Extract domain from URL
- `replace_characters($text)` - Slug generation
- `generateBreadcrumbs($path)` - Create breadcrumb arrays
- `checkIfContainsRoute($request)` - Check if route starts with 'docs/' or 'blog/'

### Routes Structure

- `/` - Homepage
- `/docs` - Documentation index
- `/docs/{repository}/{version?}/{page?}` - Documentation viewer
- `/blog` - Blog index and posts
- `/products` - Product listings
- `/open-source` - Open-source projects
- `/web-development` - Web development services
- `/vacancies` - Job listings
- `/contact` - Contact page
- `/about-us` - About page
- `/dashboard` - Authenticated dashboard
- `/profile`, `/notification`, `/billing` - User profile pages (auth required)

### Services

- `App\Services\Git` - Git repository management
- `App\Services\GitRepository` - Git operations wrapper
- `App\Services\Newsletter` - Newsletter interface
- `App\Services\MailchimpNewsletter` - Mailchimp integration
- `App\Services\ConvertKitNewsletter` - ConvertKit integration

## Important Notes

- The documentation system expects repositories to have a `docs/` folder with markdown files
- Documentation branches should be named with version numbers (e.g., `1.0`, `2.0`)
- The `master` branch is checked out first, then version-specific branches
- Images in documentation must be in an `images/` subdirectory
- All markdown is rendered with Shiki syntax highlighting via Torchlight
- The application uses Laravel Breeze for authentication scaffolding
