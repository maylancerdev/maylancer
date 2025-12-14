<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Documentation Repositories
    |--------------------------------------------------------------------------
    |
    | This array contains all documentation repositories that will be imported
    | and displayed. Each repository has a name, GitHub path, and a category.
    |
    | Branches are auto-detected from GitHub unless explicitly specified.
    | The system automatically detects version branches (v1, v2, 1.0, 2.0, etc.)
    | and maps them to aliases (v1, v2, etc.). The main/master branch becomes 'latest'.
    |
    | To manually specify branches, add a 'branches' key with branch => alias mapping:
    | 'branches' => ['2.0' => 'v2', '1.1' => 'v1']
    |
    */

    'repositories' => [
        [
            'name' => 'nuban',
            'repository' => 'maylancerdev/nuban',
            // Branches auto-detected from GitHub (2.0 => v2, 1.1 => v1)
            'category' => 'APIs',
            'full_name' => 'Real-time Nigeria Bank API',
            'description' => 'Real-time Nigeria bank account validation API',
            'demo' => 'https://maylancer.org/api/nuban/',
            'support' => 'https://maylancer.org/support',
        ],
        [
            'name' => 'mailcade',
            'repository' => 'maylancerdev/MailCade-docs',
            // Branches auto-detected from GitHub (master => latest)
            'category' => 'Tools',
            'full_name' => 'Developer Mail Sandbox - Email testing made easy',
            'description' => 'Email testing sandbox for developers',
            'demo' => 'https://github.com/olakunlevpn/MailCade/releases',
            'support' => 'https://maylancer.org/support',
        ],
        [
            'name' => 'laravel-installer',
            'repository' => 'maylancerdev/laravel-installer-docs',
            // Branches auto-detected from GitHub (master => latest)
            'docs_path' => '.', // Docs are in root, not in a subdirectory
            'category' => 'Tools',
            'full_name' => 'Laravel Installer',
            'description' => 'Streamlined Laravel application installer',
            'demo' => 'https://github.com/olakunlevpn/laravel-installer/releases',
            'support' => 'https://maylancer.org/support',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Storage Paths
    |--------------------------------------------------------------------------
    |
    | These paths define where documentation files and temporary Git clones
    | are stored on the filesystem.
    |
    */

    'path' => storage_path('docs-temp'),
    'temp' => storage_path('docs-temp'),
    'asset_path' => 'images/docs',
];
