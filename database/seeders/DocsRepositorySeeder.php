<?php

namespace Database\Seeders;

use App\Models\DocsRepository;
use Illuminate\Database\Seeder;

class DocsRepositorySeeder extends Seeder
{
    public function run(): void
    {
        $repositories = [
            [
                'name' => 'nuban',
                'repository' => 'maylancerdev/nuban',
                'category' => 'APIs',
                'full_name' => 'Real-time Nigeria Bank API',
                'description' => 'Real-time Nigeria bank account validation API',
                'demo' => 'https://maylancer.org/api/nuban/',
                'support' => 'https://maylancer.org/support',
                'docs_path' => 'docs',
            ],
            [
                'name' => 'mailcade',
                'repository' => 'maylancerdev/MailCade-docs',
                'category' => 'Tools',
                'full_name' => 'Developer Mail Sandbox - Email testing made easy',
                'description' => 'Email testing sandbox for developers',
                'demo' => 'https://github.com/olakunlevpn/MailCade/releases',
                'support' => 'https://maylancer.org/support',
                'docs_path' => 'docs',
            ],
            [
                'name' => 'laravel-installer',
                'repository' => 'maylancerdev/laravel-installer-docs',
                'category' => 'Tools',
                'full_name' => 'Laravel Installer',
                'description' => 'Streamlined Laravel application installer',
                'demo' => 'https://github.com/olakunlevpn/laravel-installer/releases',
                'support' => 'https://maylancer.org/support',
                'docs_path' => '.',
            ],
        ];

        foreach ($repositories as $repository) {
            DocsRepository::updateOrCreate(
                ['name' => $repository['name']],
                $repository,
            );
        }
    }
}
