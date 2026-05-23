<?php

namespace App\Providers;

use App\Docs\DocumentationContentParser;
use App\Docs\DocumentationPage;
use App\Docs\DocumentationPathParser;
use App\Models\DocsRepository;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Schema;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('docs_repositories')) {
            DocsRepository::all()->each(function (DocsRepository $repo) {
                config()->set("filesystems.disks.{$repo->name}", [
                    'driver' => 'local',
                    'root' => storage_path("docs/{$repo->name}"),
                ]);

                config()->set("sheets.collections.{$repo->name}", [
                    'disk' => $repo->name,
                    'sheet_class' => DocumentationPage::class,
                    'path_parser' => DocumentationPathParser::class,
                    'content_parser' => DocumentationContentParser::class,
                ]);
            });
        }

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
