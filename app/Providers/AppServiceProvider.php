<?php

namespace App\Providers;

use App\Docs\DocumentationContentParser;
use App\Docs\DocumentationPage;
use App\Docs\DocumentationPathParser;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server'),
            ]);

            return new MailchimpNewsletter($client);
        });

        // Register Sheets collections dynamically for each documentation repository
        foreach (config('docs.repositories') as $docsRepository) {
            config()->set("filesystems.disks.{$docsRepository['name']}", [
                'driver' => 'local',
                'root' => storage_path("docs/{$docsRepository['name']}"),
            ]);

            config()->set("sheets.collections.{$docsRepository['name']}", [
                'disk' => $docsRepository['name'],
                'sheet_class' => DocumentationPage::class,
                'path_parser' => DocumentationPathParser::class,
                'content_parser' => DocumentationContentParser::class,
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Str::macro('readDuration', function (...$text) {
            $totalWords = str_word_count(implode(' ', $text));
            $minutesToRead = round($totalWords / 200);

            return (int) max(1, $minutesToRead);
        });

    }
}
